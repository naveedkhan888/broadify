<?php
namespace Elementor; // Custom widgets must be defined in the Elementor namespace
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly (security measure)

/**
 * Widget Name: Pricing Table
 */
class Xhub_Pricing_Table_New extends Widget_Base{

 	// The get_name() method is a simple one, you just need to return a widget name that will be used in the code.
	public function get_name() {
		return 'ipricingtablenew';
	}

	// The get_title() method, which again, is a very simple one, you need to return the widget title that will be displayed as the widget label.
	public function get_title() {
		return __( 'XP Pricing Table New', 'xhub' );
	}

	// The get_icon() method, is an optional but recommended method, it lets you set the widget icon. you can use any of the eicon or font-awesome icons, simply return the class name as a string.
	public function get_icon() {
		return 'eicon-price-table';
	}

	// The get_categories method, lets you set the category of the widget, return the category name as a string.
	public function get_categories() {
		return [ 'category_xhub' ];
	}

	protected function register_controls() {


		// Devices Section
        $this->start_controls_section(
            '_section_devices',
            [
                'label' => __('Devices', 'bdevselement'),
            ]
        );

        $this->add_control(
            'devices_switch',
            [
                'label' => __('Show', 'bdevselement'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('Show', 'bdevselement'),
                'label_off' => __('Hide', 'bdevselement'),
                'return_value' => 'yes',
                'default' => 'yes',
                'style_transfer' => true,
            ]
        );

        $repeater = new Repeater();

        $repeater->add_control(
            'selected_icon_2',
            [
                'label' => __('Icon', 'bdevselement'),
                'type' => Controls_Manager::ICONS,
                'fa4compatibility' => 'icon',
                'default' => [
                    'value' => 'fas fa-check',
                    'library' => 'fa-solid',
                ],
                'recommended' => [
                    'fa-regular' => [
                        'check-square',
                        'window-close',
                    ],
                    'fa-solid' => [
                        'check',
                    ],
                ],
            ]
        );

        $this->add_control(
            'devices',
            [
                'label' => __('Devices List', 'bdevselement'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'title_field' => '{{ selected_icon_2.value }}',
            ]
        );

        $this->end_controls_section();

		//Content Service box
		$this->start_controls_section(
			'content_section',
			[
				'label' => __( 'Pricing Table', 'xhub' ),
			]
		);

		$this->add_control(
			'is_featured',
			[
				'label' => __( 'Pricing Table Featured', 'xhub' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Yes', 'xhub' ),
				'label_off' => __( 'No', 'xhub' ),
				'return_value' => 'yes',
				'default' => '',
			]
		);

		$this->add_control(
			'title',
			[
				'label' => __( 'Title', 'xhub' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'Standard', 'xhub' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'price',
			[
				'label' => __( 'Price', 'xhub' ),
				'type' => Controls_Manager::TEXTAREA,
				'default' => __( '<sup>$</sup> 29', 'xhub' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'price_for',
			[
				'label' => __( 'Text Under Price', 'xhub' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'per m2', 'xhub' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'short_text',
			[
				'label' => 'Short Text',
				'type' => Controls_Manager::TEXTAREA,
				'default' => __( 'Discover the emerging technologies most relevant to your strategy by working.', 'xhub' ),
			]
		);

		$this->add_control(
			'details',
			[
				'label' => 'Details',
				'type' => Controls_Manager::TEXTAREA,
				'default' => __( '<ul><li class="active">Structure of a project</li><li class="active">Measurement of the room</li><li>3D-Visualization of premises</li></ul>', 'xhub' ),
			]
		);

		$this->add_control(
			'label_link',
			[
				'label' => 'Button',
				'type' => Controls_Manager::TEXTAREA,
				'default' => __( 'Choose Plane', 'xhub' ),
			]
		);

		$this->add_control(
			'link',
			[
				'label' => __( 'Link', 'xhub' ),
				'type' => Controls_Manager::URL,
				'placeholder' => __( 'https://your-link.com', 'xhub' ),
				'condition' => [
					'label_link!' => '',
				],
			]
		);

		$this->end_controls_section();

		//Style
		$this->start_controls_section(
			'style_section_devices',
			[
				'label' => __( 'Devices', 'xhub' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
		    'device_icon_size',
		    [
		        'label' => __('Icon Size (px)', 'bdevselement'),
		        'type' => Controls_Manager::SLIDER,
		        'range' => [
		            'px' => [
		                'min' => 10,
		                'max' => 100,
		            ],
		        ],
		        'selectors' => [
		            '{{WRAPPER}} .xptf-devices-list i' => 'font-size: {{SIZE}}{{UNIT}};',
		        ],
		    ]
		);

		$this->add_control(
		    'device_icon_color',
		    [
		        'label' => __('Icon Color', 'bdevselement'),
		        'type' => Controls_Manager::COLOR,
		        'selectors' => [
		            '{{WRAPPER}} .xptf-devices-list i' => 'color: {{VALUE}};',
		        ],
		    ]
		);

		$this->add_control(
		    'device_plus_color',
		    [
		        'label' => __('Plus (+) Color', 'bdevselement'),
		        'type' => Controls_Manager::COLOR,
		        'selectors' => [
		            '{{WRAPPER}} .xptf-devices-list .plus-separator:before' => 'color: {{VALUE}};',
		        ],
		    ]
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'style_table_section',
			[
				'label' => __( 'Table', 'xhub' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_responsive_control(
			'box_padding',
			[
				'label' => __( 'Padding Box', 'xhub' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .inner-table' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'radius_box',
			[
				'label' => __( 'Border Radius', 'xhub' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .xp-pricing-table' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'bg_box',
			[
				'label' => __( 'Background', 'xhub' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .inner-table' => 'background: {{VALUE}};',
				]
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'box_border',
				'selector' => '{{WRAPPER}} .inner-table',
			]
		);		
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'ibox_box_shadow',
				'selector' => '{{WRAPPER}} .xp-pricing-table',
				'separator' => 'before',
			]
		);
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'style_content_section',
			[
				'label' => __( 'Content', 'xhub' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		//Title
		$this->add_control(
			'heading_title',
			[
				'label' => __( 'Title', 'xhub' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->add_responsive_control(
			'title_spacing',
			[
				'label' => __( 'Spacing', 'xhub' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .xp-pricing-table .title-table' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'title_color',
			[
				'label' => __( 'Color', 'xhub' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .title-table span' => 'color: {{VALUE}};',
				]
			]
		);
		$this->add_control(
			'title_bgcolor',
			[
				'label' => __( 'Background', 'xhub' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .title-table span' => 'background: {{VALUE}};',
				]
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'selector' => '{{WRAPPER}} .title-table span',
			]
		);

		//Price
		$this->add_control(
			'heading_price',
			[
				'label' => __( 'Price', 'xhub' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->add_responsive_control(
			'price_space',
			[
				'label' => __( 'Spacing', 'xhub' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .xp-pricing-table h2, {{WRAPPER}} .inner-table > p' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'price_color',
			[
				'label' => __( 'Color', 'xhub' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .xp-pricing-table h2' => 'color: {{VALUE}};',
				]
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'price_typography',
				'selector' => '{{WRAPPER}} .xp-pricing-table h2',
			]
		);

		//Under Price
		$this->add_control(
			'heading_price_for',
			[
				'label' => __( 'Under Price', 'xhub' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->add_control(
			'price_for_color',
			[
				'label' => __( 'Color', 'xhub' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .inner-table > p' => 'color: {{VALUE}};',
					'{{WRAPPER}} .inner-table > p:before' => 'background: {{VALUE}};',
				]
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'price_for_typography',
				'selector' => '{{WRAPPER}} .inner-table > p',
			]
		);

		//Short Text
		$this->add_control(
			'heading_stext',
			[
				'label' => __( 'Short Text', 'xhub' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->add_responsive_control(
			'stext_spacing',
			[
				'label' => __( 'Spacing', 'xhub' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .xp-pricing-table .short-text' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'stext_color',
			[
				'label' => __( 'Color', 'xhub' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .xp-pricing-table .short-text' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'stext_typography',
				'selector' => '{{WRAPPER}} .xp-pricing-table .short-text',
			]
		);	

		//Details
		$this->add_control(
			'heading_des',
			[
				'label' => __( 'Details', 'xhub' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->add_responsive_control(
			'des_padding',
			[
				'label' => __( 'Spacing', 'xhub' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .xp-pricing-table .details' => 'padding: {{SIZE}}{{UNIT}} 0;',
				],
			]
		);
		$this->add_control(
			'des_border_color',
			[
				'label' => __( 'Line Color', 'xhub' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .xp-pricing-table .details' => 'border-color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'des_color',
			[
				'label' => __( 'Color', 'xhub' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .xp-pricing-table .details ul li' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'des_active_color',
			[
				'label' => __( 'Active Color', 'xhub' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .xp-pricing-table .details ul li.active' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'des_typography',
				'selector' => '{{WRAPPER}} .xp-pricing-table .details',
			]
		);
		$this->add_control(
			'icon_list',
			[
				'label' => __( 'Icon List', 'xhub' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Yes', 'xhub' ),
				'label_off' => __( 'No', 'xhub' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);	

		//Button
		$this->add_control(
			'heading_btn',
			[
				'label' => __( 'Button', 'xhub' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
				'condition' => [
					'label_link!' => '',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'btn_typography',
				'selector' => '{{WRAPPER}} .xp-pricing-table .xptf-btn',
				'condition' => [
					'label_link!' => '',
				],
			]
		);

		$this->start_controls_tabs( 'tabs_btn_style' );
		$this->start_controls_tab(
			'tab_btn_normal',
			[
				'label' => __( 'Normal', 'xhub' ),
				'condition' => [
					'label_link!' => '',
				],
			]
		);

		$this->add_control(
			'btn_bg_color',
			[
				'label' => __( 'Background Color', 'xhub' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .xp-pricing-table .xptf-btn' => 'background: {{VALUE}};',
				],
				'condition' => [
					'label_link!' => '',
				],
			]
		);
		$this->add_control(
			'btn_color',
			[
				'label' => __( 'Color', 'xhub' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .xp-pricing-table .xptf-btn' => 'color: {{VALUE}};',
				],
				'condition' => [
					'label_link!' => '',
				],
			]
		);
		$this->add_control(
			'btn_bcolor',
			[
				'label' => __( 'Border Color', 'xhub' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .xp-pricing-table .xptf-btn' => 'border-color: {{VALUE}};',
				],
				'condition' => [
					'label_link!' => '',
				],
			]
		);
		$this->end_controls_tab();

		$this->start_controls_tab(
			'tab_btn_hover',
			[
				'label' => __( 'Hover', 'xhub' ),
				'condition' => [
					'label_link!' => '',
				],
			]
		);
		$this->add_control(
			'hover_btn_bg_color',
			[
				'label' => __( 'Background Color', 'xhub' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .xp-pricing-table .xptf-btn:hover' => 'background: {{VALUE}};',
				],
				'condition' => [
					'label_link!' => '',
				],
			]
		);
		$this->add_control(
			'hover_btn_color',
			[
				'label' => __( 'Color', 'xhub' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .xp-pricing-table .xptf-btn:hover' => 'color: {{VALUE}};',
				],
				'condition' => [
					'label_link!' => '',
				],
			]
		);
		$this->add_control(
			'hover_btn_bcolor',
			[
				'label' => __( 'Border Color', 'xhub' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .xp-pricing-table .xptf-btn:hover' => 'border-color: {{VALUE}};',
				],
				'condition' => [
					'label_link!' => '',
				],
			]
		);
		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->end_controls_section();

	}

	protected function render() {

    $settings = $this->get_settings_for_display();

    // Set up button attributes
    if ( ! empty( $settings['link']['url'] ) ) {
        $this->add_render_attribute( 'button', 'href', $settings['link']['url'] );

        if ( $settings['link']['is_external'] ) {
            $this->add_render_attribute( 'button', 'target', '_blank' );
        }

        if ( $settings['link']['nofollow'] ) {
            $this->add_render_attribute( 'button', 'rel', 'nofollow' );
        }
    }
    $this->add_render_attribute( 'button', 'class', 'xptf-btn xptf-btn-border' );
    ?>

    <div class="xp_pricing_new xp-pricing-table <?php if ( $settings['is_featured'] ) echo 'is-featured'; ?>">
        <div class="layer-behind"></div>
        <div class="inner-table">

            <?php if ( $settings['title'] ) : ?>
                <h6 class="title-table"><span><?php echo esc_html( $settings['title'] ); ?></span></h6>
            <?php endif; ?>

            <?php if ( $settings['short_text'] ) : ?>
                <div class="short-text"><?php echo wp_kses_post( $settings['short_text'] ); ?></div>
            <?php endif; ?>

            <?php if ( $settings['price'] ) : ?>
                <h2><?php echo ( $settings['price'] ); ?></h2>
            <?php endif; ?>

            <?php if ( $settings['price_for'] ) : ?>
                <p><?php echo esc_html( $settings['price_for'] ); ?></p>
            <?php endif; ?>

            <?php if ( $settings['devices_switch'] === 'yes' && ! empty( $settings['devices'] ) ) : ?>
			    <div class="xptf-devices-list">
			        <ul class="device-icons">
			            <?php
			            $total = count( $settings['devices'] );
			            foreach ( $settings['devices'] as $index => $device ) :
			                if ( ! empty( $device['selected_icon_2']['value'] ) ) : ?>
			                    <li>
			                        <i class="<?php echo esc_attr( $device['selected_icon_2']['value'] ); ?>"></i>
			                        <?php if ( $index < $total - 1 ) : ?>
			                            <span class="plus-separator"></span>
			                        <?php endif; ?>
			                    </li>
			                <?php endif;
			            endforeach; ?>
			        </ul>
			    </div>
			<?php endif; ?>

            <div class='details <?php echo esc_attr( empty($settings['icon_list']) ? 'no-icon' : '' ); ?>'>
                <?php echo wp_kses_post( $settings['details'] ); ?>
            </div>

            <?php if ( $settings['label_link'] ) : ?>
                <a <?php echo $this->get_render_attribute_string( 'button' ); ?>><?php echo esc_html( $settings['label_link'] ); ?></a>
            <?php endif; ?>


        </div>
    </div>

    <?php
}

}
// After the Xhub_Pricing_Table_New class is defined, I must register the new widget class with Elementor:
Plugin::instance()->widgets_manager->register( new Xhub_Pricing_Table_New() );