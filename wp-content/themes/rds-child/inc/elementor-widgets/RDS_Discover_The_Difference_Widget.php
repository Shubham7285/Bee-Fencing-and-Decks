<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}
require_once(get_template_directory() . '/inc/custom-widget-function.php');

class RDS_Discover_The_Difference_Widget extends \Elementor\Widget_Base {
    use FileVariations;
    use FeatureJSONUpdate;
    public $allVariation;
    public $widgetPath;
public $widgetPathFull;
    public $globalPath = false;

    public function __construct($data = [], $args = null) {
        parent::__construct($data, $args);
if ( $data && is_numeric( $data['id'] ) ) {             
			$this->globalPath = true;			
        }
        $this->widgetPath = "discover-the-difference";
        $this->widgetPathFull = "/global-templates/" . $this->widgetPath . "/"; 
        $this->allVariation = $this->getFileVariations($this->widgetPath);
    }

    public function get_categories() {
        return ['rds-global-widgets'];
    }

    public function get_name() {
        return 'rds-discover-the-difference-widget';
    }

    public function get_title() {
        return 'Discover The Difference';
    }

    public function get_icon() {
        return 'eicon-custom';
    }

    protected function _register_controls() {
        global $rdsTemplateDataGlobal;
        $args = $rdsTemplateDataGlobal;
        
        /* $itemsArray = [
            [
                "item_icon" => "icon-users2",
                "item_title" => "Satisfaction Guaranteed",
                "item_description" => "Lorem ipsum dolor sit amet, morbi et consectetur adipiscing elit. Ac morbi consequat morbi mi ut. Amet feugiat."
            ]
        ]; */
		$itemsArray = [
			[
				/* 'item_image' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(), // or your image
					'id' => '',
				], */
				'item_title' => 'Satisfaction Guaranteed',
				'item_description' => 'Lorem ipsum dolor sit amet...',
			]
		];

        $this->start_controls_section(
            'discover_the_diffrence',
            array(
                'label' => __('Discover The Difference', 'rds-discover-the-difference-widget'),
            )
        );
       
        $this->add_control(
            'heading',
            array(
                'label' => 'Heading',
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'What To Expect',
            )
        );
      
        // Subheading control
        $this->add_control(
            'subheading',
            array(
                'label' => 'Subheading',
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'Discover the [ Insert Company Name ] Difference',
            )
        );
       // Description control
        $this->add_control(
            'description',
            array(
                'label' => 'Description',
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'See why our friends and neighbors continue to choose Bee Fencing and Decks to complete their projects.',
            )
        );
        if (!empty($this->allVariation) && count($this->allVariation) > 1) {
            $defaultVariation = isset($args['globals']['discover_the_difference']['variation']) ? $args['globals']['discover_the_difference']['variation'] : "a";
            $this->add_control("variation", [
                "label" => "Variation",
                "type" => \Elementor\Controls_Manager::SELECT,
                "default" =>$defaultVariation,
                "options" => $this->allVariation,
            ]);
        }

        $this->add_control(
            'accordion_items',
            array(
                'label' => __('Items', 'rds-discover-the-difference-widget'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => array(
                    [
                    "name" => "item_image",
                    "label" => __("Image", "rds-discover-the-difference-widget"),
                    "type" => \Elementor\Controls_Manager::MEDIA,
                     'default' =>  array(
						'url' => \Elementor\Utils::get_placeholder_image_src(),
					), 
                    "label_block" => true,
                ],
				
                    array(
                        'name' => 'item_title',
                        'label' => __('Title', 'rds-discover-the-difference-widget'),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'default' => 'Satisfaction Guaranteed',
                        'label_block' => true,
                    ),
                    array(
                        'name' => 'item_description',
                        'label' => __('Description', 'rds-discover-the-difference-widget'),
                        'type' => \Elementor\Controls_Manager::TEXTAREA,
                        'default' => 'Lorem ipsum dolor sit amet, morbi et consectetur adipiscing elit. Ac morbi consequat morbi mi ut. Amet feugiat',
                        'label_block' => true,
                    ),
                ),
                'default' => $itemsArray,
                'image_field' => '{{{ item_image }}}', // Field to be used as the title in the editor
                'title_field' => '{{{ item_title }}}',
                'description_field' => '{{{ item_description }}}'
            )
        );
        $this->add_control(
            'button_link',
            array(
                'label' => 'Button Link',
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => '/about',
            )
        );

        $this->add_control(
            'button_text',
            array(
                'label' => 'Button Text',
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'About us',
            )
        );
        $this->end_controls_section();
    }

    public function render() {
        $settings = $this->get_settings();
        $i = 0;
        if (!empty($settings) && is_array($settings)) {
            $button_link = isset($settings['button_link']) ? sanitize_text_field($settings['button_link']) : "";
           
            $items_Array = array();
            if (!empty($settings['accordion_items'])) {
                foreach ($settings['accordion_items'] as $item) {
                    $items_Array[$i]['image'] = esc_url($item['item_image']['url']);
					 $items_Array[$i]['image_id'] = $item['item_image']['id'];
                    $items_Array[$i]['title'] = $item['item_title'];
                    $items_Array[$i]['description'] = $item['item_description'];
                    $i++;
                }
            }
            if (!empty($this->allVariation) && count($this->allVariation) > 1) {
                $args['globals']['discover_the_difference']['variation'] = sanitize_text_field($settings['variation']);
            }
            $args['globals']['discover_the_difference']['button_link'] = $button_link;
            $args['globals']['discover_the_difference']['items'] = $items_Array;
            $args['globals']['discover_the_difference']['heading'] = $settings['heading'];
            $args['globals']['discover_the_difference']['subheading'] = $settings['subheading'];
            $args['globals']['discover_the_difference']['description'] = $settings['description'];
            $args['globals']['discover_the_difference']['button_text'] = sanitize_text_field($settings['button_text']);
            
         // SAVE TO SPEC
         if ($this->globalPath){
            $this->setFeatureJsonData($args);
		}
            // RENDER VARIATION
            $variationVal = isset($settings["variation"]) ? sanitize_text_field($settings["variation"]) : 'a';
            set_query_var('settings', $settings);
            get_template_part($this->widgetPathFull . $variationVal, null, $args);
        }
    }

}
