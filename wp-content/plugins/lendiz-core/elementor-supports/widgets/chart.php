<?php
/**
 * Lendiz Elementor Addon Chart Widget
 *
 * @since 1.0.0
 */
class Elementor_Chart_Widget extends \Elementor\Widget_Base {
	
	private $excerpt_len;
	
	/**
	 * Get widget name.
	 *
	 * Retrieve Chart widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return "lendizchart";
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve Chart widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( "Chart", "lendiz-core" );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve Chart widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return "ti-pie-chart";
	}


	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the Animated Text widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ "lendiz-elements" ];
	}
	
	/**
	 * Retrieve the list of scripts the chart widget depended on.
	 *
	 * Used to set scripts dependencies required to run the widget.
	 *
	 * @since 1.3.0
	 * @access public
	 *
	 * @return array Widget scripts dependencies.
	 */
	public function get_script_depends() {
		return [ 'chart-bundle', 'custom-front'  ];
	}

	/**
	 * Register Animated Text widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function _register_controls() {

		//General Section
		$this->start_controls_section(
			"general_section",
			[
				"label"	=> esc_html__( "General", "lendiz-core" ),
				"tab"	=> \Elementor\Controls_Manager::TAB_CONTENT,
				"description"	=> esc_html__( "Default chart options.", "lendiz-core" ),
			]
		);
		$this->add_control(
			"extra_class",
			[
				"type"			=> \Elementor\Controls_Manager::TEXT,
				"label" 		=> esc_html__( "Extra Class", "lendiz-core" ),
				"description"	=> esc_html__( "Put extra class for some additional styles.", "lendiz-core" ),
			]
		);
		$this->add_control(
			"title",
			[
				"type"			=> \Elementor\Controls_Manager::TEXT,
				"label"			=> esc_html__( "Title", "lendiz-core" ),
				"description"	=> esc_html__( "Here you put the chart title.", "lendiz-core" ),
				"default" 		=> esc_html__( "Chart", "lendiz-core" ),
			]
		);
		$this->add_control(
			"chart_width",
			[
				"type"			=> \Elementor\Controls_Manager::TEXT,
				"label"			=> esc_html__( "Chart Width", "lendiz-core" ),
				"description"	=> esc_html__( "Here you can specify chart width. Example 800", "lendiz-core" ),
				"default" 		=> "800"
			]
		);
		$this->add_control(
			"chart_height",
			[
				"type"			=> \Elementor\Controls_Manager::TEXT,
				"label"			=> esc_html__( "Chart Height", "lendiz-core" ),
				"description"	=> esc_html__( "Here you can specify chart height. Example 300", "lendiz-core" ),
				"default" 		=> "300"
			]
		);
		$this->add_control(
			"chart_type",
			[
				"label"			=> esc_html__( "Chart Type", "lendiz-core" ),
				"type"			=> \Elementor\Controls_Manager::SELECT,
				"default"		=> "pie",
				"options"		=> [
					"pie"		=> esc_html__( "Pie Chart", "lendiz-core" ),
					"doughnut"	=> esc_html__( "Doughnut Chart", "lendiz-core" ),
					"bar"		=> esc_html__( "Bar Chart", "lendiz-core" ),
					"line"		=> esc_html__( "Line Chart", "lendiz-core" )
				]
			]
		);
		$this->add_control(
			"yaxis_zorobegining",
			[
				"label" 		=> esc_html__( "Y-Axis Zero Beginning", "lendiz-core" ),
				"description"	=> esc_html__( "This is option for set y-axis zero value beginning.", "lendiz-core" ),
				"type" 			=> "toggleswitch",
				"default" 		=> "1",
				"condition" 	=> [
					"chart_type" 	=> array( "bar", "line" )
				]
			]
		);
		$this->add_control(
			"chart_bg",
			[
				"type"			=> \Elementor\Controls_Manager::COLOR,
				"label"			=> esc_html__( "Chart Background", "lendiz-core" ),
				"description"	=> esc_html__( "Here you can specify chart background color. Example #1555bd", "lendiz-core" ),
				"default" 		=> "#1555bd",
				"condition" 	=> [
					"chart_type" 	=> "line"
				]
			]
		);
		$this->add_control(
			"chart_border",
			[
				"type"			=> \Elementor\Controls_Manager::COLOR,
				"label"			=> esc_html__( "Chart Border", "lendiz-core" ),
				"description"	=> esc_html__( "Here you can specify chart border color. Example #4580e0", "lendiz-core" ),
				"default" 		=> "#1555bd",
				"condition" 	=> [
					"chart_type" 	=> "line"
				]
			]
		);
		$this->add_control(
			"chart_fill",
			[
				"label" 		=> esc_html__( "Chart Fill", "lendiz-core" ),
				"description"	=> esc_html__( "This is option for fill chart.", "lendiz-core" ),
				"type" 			=> "toggleswitch",
				"default" 		=> "1",
				"condition" 	=> [
					"chart_type" 	=> "line"
				]
			]
		);
		$this->add_control(
			"chart_responsive",
			[
				"label" 		=> esc_html__( "Chart Responsive", "lendiz-core" ),
				"description"	=> esc_html__( "This is option for responsive chart.", "lendiz-core" ),
				"type" 			=> "toggleswitch",
				"default" 		=> "1"
			]
		);
		$this->add_control(
			"legend_position",
			[
				"label"			=> esc_html__( "Chart Legend Position", "lendiz-core" ),
				"type"			=> \Elementor\Controls_Manager::SELECT,
				"default"		=> "top",
				"options"		=> [
					"none"		=> esc_html__( "None", "lendiz-core" ),
					"top"		=> esc_html__( "Top", "lendiz-core" )
				]
			]
		);
		
		$repeater = new \Elementor\Repeater();
		
		$repeater->add_control(
			"chart_labels",
			[
				"type"			=> \Elementor\Controls_Manager::TEXT,
				"label" 		=> esc_html__( "Chart Label", "lendiz-core" ),
				"description"	=> esc_html__( "Chart item label.", "lendiz-core" )
			]
		);	
		$repeater->add_control(
			"chart_values",
			[
				"type"			=> \Elementor\Controls_Manager::TEXT,
				"label" 		=> esc_html__( "Chart Value", "lendiz-core" ),
				"description"	=> esc_html__( "Chart item value.", "lendiz-core" )
			]
		);	
		$repeater->add_control(
			"chart_colors",
			[
				"type"			=> \Elementor\Controls_Manager::COLOR,
				"label" 		=> esc_html__( "Chart Color", "lendiz-core" ),
				"description"	=> esc_html__( "Chart item color.", "lendiz-core" )
			]
		);	
		$this->add_control(
			"chart_details",
			[
				"label"			=> esc_html__( "Chart Details", "lendiz-core" ),
				"description"	=> esc_html__( "This is options for put chart item labels and values.", "lendiz-core" ),
				"type"			=> \Elementor\Controls_Manager::REPEATER,
				"fields"		=> $repeater->get_controls(),
				"default"		=> [
					[
						"chart_labels" 	=> esc_html__( "HTML", "lendiz-core" ),
						"chart_values"	=> "25",
						"chart_colors"	=> "#FF3D67"
					],
					[
						"chart_labels" 	=> esc_html__( "PHP", "lendiz-core" ),
						"chart_values"	=> "30",
						"chart_colors"	=> "#36A2EB"
					],
					[
						"chart_labels" 	=> esc_html__( "WordPress", "lendiz-core" ),
						"chart_values"	=> "45",
						"chart_colors"	=> "#FFCE56"
					]
				],
				"title_field"	=> "{{{ chart_labels }}}"				
			]
		);
		
		$this->end_controls_section();

	}

	/**
	 * Render Animated Text widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {

		$settings = $this->get_settings_for_display();
		extract( $settings );
		
		//Define Variables
		$class = isset( $extra_class ) && $extra_class != '' ? $extra_class : '';	
		$title = isset( $title ) && $title != '' ? $title : '';
		$chart_type = isset( $chart_type ) && $chart_type != '' ? $chart_type : 'pie';
		$chart_width = isset( $chart_width ) && $chart_width != '' ? $chart_width : '800';
		$chart_height = isset( $chart_height ) && $chart_height != '' ? $chart_height : '300';
		$yaxis = isset( $yaxis_zorobegining ) && $yaxis_zorobegining != '' ? $yaxis_zorobegining : '1';
		
		$chart_bg = isset( $chart_bg ) && $chart_bg != '' ? $chart_bg : '#1555bd';		
		$chart_border = isset( $chart_border ) && $chart_border != '' ? $chart_border : '#4580e0';
		
		$chart_fill = isset( $chart_fill ) && $chart_fill != '' ? $chart_fill : '1';
		$chart_responsive = isset( $chart_responsive ) && $chart_responsive != '' ? $chart_responsive : '1';
		$legend_position = isset( $legend_position ) && $legend_position != '' ? $legend_position : 'top';
		
		$chart_details =  isset( $chart_details ) ? $chart_details : ''; // $prc_fetrs is pricing features
		$chart_labels = $chart_values = $chart_colors = '';
		if( $chart_details ){
			foreach( $chart_details as $chart_detail ) {
				$chart_labels .= isset( $chart_detail['chart_labels'] ) ? $chart_detail['chart_labels'] . ',' : '';
				$chart_values .= isset( $chart_detail['chart_values'] ) ? $chart_detail['chart_values'] .',' : '';
				$chart_colors .= isset( $chart_detail['chart_colors'] ) ? $chart_detail['chart_colors'] .',' : '#333333';
			}
			$chart_labels = rtrim( $chart_labels, ',' );
			$chart_values = rtrim( $chart_values, ',' );
			$chart_colors = rtrim( $chart_colors, ',' );
		}
		
		$chart_rand_id = $rand_class = 'chart-rand-' . lendiz_shortcode_rand_id();
		
		switch( $chart_type ){
			case "pie":
				echo '<canvas id="'. esc_attr( $chart_rand_id ) .'" class="pie-chart" width="'. esc_attr( $chart_width ) .'" height="'. esc_attr( $chart_height ) .'" data-type="pie" data-labels="'. esc_attr( $chart_labels ) .'" data-values="'. esc_attr( $chart_values ) .'" data-backgrounds="'. esc_attr( $chart_colors ) .'" data-responsive="'. esc_attr( $chart_responsive ) .'" data-legend-position="'. esc_attr( $legend_position ) .'"></canvas>';
			break;
			case "doughnut":
				echo '<canvas id="'. esc_attr( $chart_rand_id ) .'" class="pie-chart" width="'. esc_attr( $chart_width ) .'" height="'. esc_attr( $chart_height ) .'" data-type="doughnut" data-labels="'. esc_attr( $chart_labels ) .'" data-values="'. esc_attr( $chart_values ) .'" data-backgrounds="'. esc_attr( $chart_colors ) .'" data-responsive="'. esc_attr( $chart_responsive ) .'" data-legend-position="'. esc_attr( $legend_position ) .'"></canvas>';
			break;
			case "bar":
				echo '<canvas id="'. esc_attr( $chart_rand_id ) .'" class="pie-chart" width="'. esc_attr( $chart_width ) .'" height="'. esc_attr( $chart_height ) .'" data-type="bar" data-labels="'. esc_attr( $chart_labels ) .'" data-values="'. esc_attr( $chart_values ) .'" data-backgrounds="'. esc_attr( $chart_colors ) .'" data-responsive="'. esc_attr( $chart_responsive ) .'" data-legend-position="'. esc_attr( $legend_position ) .'" data-yaxes-zorobegining="'. esc_attr( $yaxis ) .'"></canvas>';
			break;
			case "line":
				echo '<canvas id="'. esc_attr( $chart_rand_id ) .'" class="line-chart" width="'. esc_attr( $chart_width ) .'" height="'. esc_attr( $chart_height ) .'" data-labels="'. esc_attr( $chart_labels ) .'" data-values="'. esc_attr( $chart_values ) .'" data-background="'. esc_attr( $chart_bg ) .'" data-border="'. esc_attr( $chart_border ) .'" data-fill="'. esc_attr( $chart_fill ) .'" data-responsive="'. esc_attr( $chart_responsive ) .'" data-legend-position="'. esc_attr( $legend_position ) .'" data-yaxes-zorobegining="'. esc_attr( $yaxis ) .'"></canvas>';
			break;
		}
		

	}
	
}