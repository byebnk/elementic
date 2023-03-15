<?php

class Elementic_Form_Action extends \ElementorPro\Modules\Forms\Classes\Action_Base {
    public function get_name() {return 'Mautic';}

    public function get_label() {return __( 'Mautic', 'elementic' );}

    public function register_settings_section( $widget ) {

        $widget->start_controls_section(
            'section_mautic',
            [
                'label' => __( 'Mautic', 'elementic' ),
                'condition' => [
                    'submit_actions' => $this->get_name(),
                ],
            ]
        );

        $widget->add_control(
            'mautic_url',
            [
                'label' => __( 'Mautic Form URL *', 'elementic' ),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => 'http://yourmauticurl.com/',
                'label_block' => true,
                'separator' => 'before',
                'description' => __( 'Enter the URL where you have Mautic installed', 'elementic' ),
            ]
        );

        $widget->add_control(
            'mautic_form_id',
            [
                'label' => __('Mautic Form ID *', 'elementic'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'placeholder' => '99',
                'label_block' => true,
                'separator' => 'before',
                'description' => __( 'Fill with your form id', 'elementic' ),
            ]
        );

        $widget->end_controls_section();
    }

    public function run( $record, $ajax_handler ) {
        $settings = $record->get( 'form_settings' );

        if ( empty( $settings['mautic_url'] ) ) {
            return;
        }

        if ( empty( $settings['mautic_form_id'] ) ) {
            return;
        }

        $raw_fields = $record->get( 'fields' );

        $fields = [
            'formId' => $settings['mautic_form_id']
        ];
        foreach ( $raw_fields as $id => $field ) {
            $fields[ $id ] = $field['value'];
        }

        $response = wp_remote_post(rtrim($settings['mautic_url']['url'],"/")."/form/submit?formId=".$settings['mautic_form_id'], [
            'body' => ["mauticform" => $fields],
            'headers' => [ 'X-Forwarded-For' => get_user_ip_addr() ]
        ]);

        if (is_wp_error($response)) {
            // Handle the error appropriately
            return;
        }
    }

    public function on_export( $element ) {
        return $element;
    }
}

function get_user_ip_addr() {
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        return $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        return $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        return $_SERVER['REMOTE_ADDR'];
    }
}
