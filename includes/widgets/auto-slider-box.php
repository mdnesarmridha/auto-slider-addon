<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

class Auto_Slider_Box_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'auto-slider-box';
	}

	public function get_title() {
		return esc_html__( 'Auto Slider', 'customaddons' );
	}

	public function get_icon() {
		return 'eicon-slider-push';
	}

	public function get_keywords() {
		return [ 'slides', 'carousel', 'image', 'title', 'slider' ];
	}
	
	public function get_categories() {
		return [ 'customaddons' ];
	}

	protected function _register_controls() {

		$this->start_controls_section(
			'section_autoslider_box',
			[
				'label' => esc_html__( 'Slider Box', 'autoslider' ),
			]
		);

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'list_image',
			[
				'label' => esc_html__( 'Image', 'autoslider' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
				'dynamic' => [
					'active' => true,
				],
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'list_title',
			[
				'label' => esc_html__( 'Title', 'autoslider' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
				],
				'default' => esc_html__( 'Type your Title', 'autoslider' ),
				'label_block' => true,
			]
		); 

		$repeater->add_control(
			'list_url',
			[
				'label' => esc_html__( 'URL', 'autoslider' ),
				'type' => \Elementor\Controls_Manager::URL,
				'dynamic' => [
					'active' => true,
				],
				'placeholder' => esc_html__( 'https://your-link.com', 'autoslider' ),
				'default' => [
					'url' => '#',
					'is_external' => true,
					'nofollow' => true,
					'custom_attributes' => '',
				]
			]
		);

		$this->add_control(
			'lists',
			[
				'label' => esc_html__( 'Slide Items', 'autoslider' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'show_label' => true,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'list_title' => esc_html__( 'Silde Title One', 'autoslider' ),
					],
					[
						'list_title' => esc_html__( 'Silde Title Two', 'autoslider' ),
					],
					[
						'list_title' => esc_html__( 'Silde Title Three', 'autoslider' ),
					],
					[
						'list_title' => esc_html__( 'Silde Title Four', 'autoslider' ),
					],
				],
				'title_field' => '{{{ list_title }}}',
			]
		);

		$this->add_responsive_control(
			'show_items',
			[
				'label' => esc_html__( 'Show Items', 'autoslider' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => '25',
				'tablet_default' => '33.333',
				'mobile_default' => '50',
				'options' => [
					'50' => esc_html__( 'Two', 'autoslider' ),
					'33.333' => esc_html__( 'Three', 'autoslider' ),
					'25'  => esc_html__( 'Four', 'autoslider' ),
					'20'  => esc_html__( 'Five', 'autoslider' ),
				],
				'selectors' => [
					'{{WRAPPER}} .elementor-custom-flex-item li.elementor-custom-slide-item' => 'width: {{VALUE}}vw !important;',
				],
			]
		);

		$this->add_control(
			'autoplay_speed',
			[
				'label' => esc_html__( 'AutoPlay Speed', 'autoslider' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'default' => [
					'unit' => 'px',
					'size' => '30',
				],
				'range' => [
					'px' => [
						'max' => 100,
						'min' => 20,
						'step' => 2,
					],
				],
				'selectors' => [
					'{{WRAPPER}} #elementor-custom-scroller-area ul span' => '-webkit-animation: marquee {{SIZE}}s linear infinite; animation: marquee {{SIZE}}s linear infinite;',
				],
			]
		);
		
		$this->end_controls_section();

		$this->start_controls_section(
			'section_style_image',
			[
				'label' => esc_html__( 'Slider Style', 'autoslider' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'slide_items_gap',
			[
				'label' => esc_html__( 'Gap', 'autoslider' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'default' => [
					'unit' => 'px',
					'size' => '20',
				],
				'tablet_default' => [
					'unit' => 'px',
					'size' => '15',
				],
				'mobile_default' => [
					'unit' => 'px',
					'size' => '10',
				],
				'selectors' => [
					'{{WRAPPER}} .elementor-custom-slide-item' => 'padding-left:{{SIZE}}{{UNIT}} !important;padding-right:{{SIZE}}{{UNIT}}!important;',
				],
			]
		);

		$this->add_control(
			'heading_overly_image',
			[
				'label' => esc_html__( 'Image', 'autoslider' ),
				'type' => \Elementor\Controls_Manager::HEADING,
			]
		);

		$this->add_responsive_control(
			'width',
			[
				'label' => esc_html__( 'Width', 'autoslider' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'default' => [
					'unit' => '%',
				],
				'tablet_default' => [
					'unit' => '%',
				],
				'mobile_default' => [
					'unit' => '%',
				],
				'size_units' => [ '%', 'px', 'vw' ],
				'range' => [
					'%' => [
						'min' => 1,
						'max' => 100,
					],
					'px' => [
						'min' => 1,
						'max' => 1000,
					],
					'vw' => [
						'min' => 1,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .elementor-custom-slide-item img' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'space',
			[
				'label' => esc_html__( 'Max Width', 'autoslider' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'default' => [
					'unit' => '%',
				],
				'tablet_default' => [
					'unit' => '%',
				],
				'mobile_default' => [
					'unit' => '%',
				],
				'size_units' => [ '%', 'px', 'vw' ],
				'range' => [
					'%' => [
						'min' => 1,
						'max' => 100,
					],
					'px' => [
						'min' => 1,
						'max' => 1000,
					],
					'vw' => [
						'min' => 1,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .elementor-custom-slide-item img' => 'max-width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'height',
			[
				'label' => esc_html__( 'Height', 'autoslider' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'default' => [
					'unit' => 'px',
				],
				'tablet_default' => [
					'unit' => 'px',
				],
				'mobile_default' => [
					'unit' => 'px',
				],
				'size_units' => [ 'px', 'vh' ],
				'range' => [
					'px' => [
						'min' => 1,
						'max' => 500,
					],
					'vh' => [
						'min' => 1,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .elementor-custom-slide-item img' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'object-fit',
			[
				'label' => esc_html__( 'Object Fit', 'autoslider' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'condition' => [
					'height[size]!' => '',
				],
				'options' => [
					'' => esc_html__( 'Default', 'autoslider' ),
					'fill' => esc_html__( 'Fill', 'autoslider' ),
					'cover' => esc_html__( 'Cover', 'autoslider' ),
					'contain' => esc_html__( 'Contain', 'autoslider' ),
				],
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .elementor-custom-slide-item img' => 'object-fit: {{VALUE}};',
				],
			]
		);
		$this->start_controls_tabs( 'image_effects' );

		$this->start_controls_tab( 'normal',
			[
				'label' => esc_html__( 'Normal', 'autoslider' ),
			]
		);

		$this->add_control(
			'opacity',
			[
				'label' => esc_html__( 'Opacity', 'autoslider' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 1,
						'min' => 0.10,
						'step' => 0.01,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .elementor-custom-slide-item img' => 'opacity: {{SIZE}};',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Css_Filter::get_type(),
			[
				'name' => 'css_filters',
				'selector' => '{{WRAPPER}} .elementor-custom-slide-item img',
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab( 'hover',
			[
				'label' => esc_html__( 'Hover', 'autoslider' ),
			]
		);

		$this->add_control(
			'opacity_hover',
			[
				'label' => esc_html__( 'Opacity', 'autoslider' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 1,
						'min' => 0.10,
						'step' => 0.01,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .elementor-custom-slide-item:hover img' => 'opacity: {{SIZE}};',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Css_Filter::get_type(),
			[
				'name' => 'css_filters_hover',
				'selector' => '{{WRAPPER}} .elementor-custom-slide-item:hover img',
			]
		);

		$this->add_control(
			'background_hover_transition',
			[
				'label' => esc_html__( 'Transition Duration', 'autoslider' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 3,
						'step' => 0.1,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .elementor-custom-slide-item img' => 'transition: {{SIZE}}s',
					'{{WRAPPER}} .elementor-custom-slide-item .slide-title' => 'transition: {{SIZE}}s',
				],
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->add_control(
			'heading_overly_title',
			[
				'label' => esc_html__( 'Title', 'autoslider' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_responsive_control(
			'title_text_align',
			[
				'label' => esc_html__( 'Alignment', 'autoslider' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => esc_html__( 'Left', 'autoslider' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'autoslider' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'autoslider' ),
						'icon' => 'eicon-text-align-right',
					],
				],
				'default' => 'center',
				'selectors' => [
					'{{WRAPPER}} .elementor-custom-slide-item .slide-title' => 'text-align: {{VALUE}};',
				],
			]
		);

		$this->add_responsive_control(
			'overly_title_margin',
			[
				'label' => esc_html__( 'Margin', 'autoslider' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .elementor-custom-slide-item .slide-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		
		$this->add_responsive_control(
			'overly_title_padding',
			[
				'label' => esc_html__( 'Padding', 'autoslider' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .elementor-custom-slide-item .slide-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'overly_title_color',
			[
				'label' => esc_html__( 'Color', 'autoslider' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .elementor-custom-slide-item .slide-title' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'overly_title_hover_color',
			[
				'label' => esc_html__( 'Hover Color', 'autoslider' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .elementor-custom-slide-item .slide-title:hover' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'overly_title_typography',
				'selector' => '{{WRAPPER}} .elementor-custom-slide-item .slide-title',
				
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'overly_title_shadow',
				'selector' => '{{WRAPPER}} .elementor-custom-slide-item .slide-title',
			]
		);

		$this->end_controls_section();

	}

	protected function render() {
		$settings = $this->get_settings();
		$has_content = ! \Elementor\Utils::is_empty( $settings['lists'] );
		?>

		<div id="elementor-custom-scroller-area" class="elementor-scroller-area" >

			<?php

			if ( $has_content ) {
				?>
				<ul class="elementor-custom-flex-item">
					<span class="elementor-custom-flex-item">
						<?php
							foreach ( $settings['lists'] as $list ) {

								if ( $list['list_title'] ) {
									?>
										<li class="elementor-custom-slide-item">

											<a href="<?php echo $list['list_url']['url']; ?>"><img src="<?php echo $list['list_image']['url']; ?>"></a>
											<a href="<?php echo $list['list_url']['url']; ?>"><h3 class="slide-title"><?php echo $list['list_title']; ?></h3></a>	

										</li>
									<?php
								}

							}
						?>
					</span>
					<span class="elementor-custom-flex-item">
						<?php
							foreach ( $settings['lists'] as $list ) {

								if ( $list['list_title'] ) {
									?>
										<li class="elementor-custom-slide-item">

											<a href="<?php echo $list['list_url']['url']; ?>"><img src="<?php echo $list['list_image']['url']; ?>"></a>
											<a href="<?php echo $list['list_url']['url']; ?>"><h3 class="slide-title"><?php echo $list['list_title']; ?></h3></a>	

										</li>
									<?php
								}

							}
						?>
					</span>
				</ul>

				<?php

			}

			?>
		</div>
		<style>#elementor-custom-scroller-area{z-index:1;overflow:hidden}#elementor-custom-scroller-area ul{margin:0;padding:0;height:100%;list-style:none;border:0;outline:0;font-size:100%;vertical-align:baseline;background:0 0}#elementor-custom-scroller-area ul:hover span.elementor-custom-flex-item{-webkit-animation-play-state:paused !important;animation-play-state:paused !important;}#elementor-custom-scroller-area .elementor-custom-flex-item{display:flex;flex:1 0 auto;-webkit-box-orient:horizontal}#elementor-custom-scroller-area ul span{display:inline-flex;align-items:center;-webkit-transform:translateX(0);transform:translateX(0);-webkit-transition:.5s ease-in-out;transition:.5s ease-in-out}#elementor-custom-scroller-area li{margin:0;padding:0 30px;vertical-align:top;width:25vw;overflow:hidden;flex:1}#elementor-custom-scroller-area .elementor-custom-slide-item a{width:100%;height:100%}#elementor-custom-scroller-area .elementor-custom-slide-item .title{display:inline-block;margin-top:15px;line-height:1.6;font-size:14px;white-space:nowrap}@-webkit-keyframes marquee{0%{-webkit-transform:translateX(0)}to{-webkit-transform:translateX(-100%)}}@keyframes marquee{0%{-webkit-transform:translateX(0);transform:translateX(0)}to{-webkit-transform:translateX(-100%);transform:translateX(-100%)}}@-webkit-keyframes marqueeSafari{0%{left:0}to{left:-150%}}@keyframes marqueeSafari{0%{left:0}to{left:-150%}}
		</style>
		
	<?php

	}

	

}