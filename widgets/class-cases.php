<?php
/**
 * Cases class.
 *
 * @category   Class
 * @package    ElementorCases
 * @subpackage WordPress
 * @author     Diego Pereira do Nascimento <diego.nascimento@dootax.com.br>
 * @copyright  2022 - Diego Pereira do Nascimento
 * @license    https://opensource.org/licenses/GPL-3.0 GPL-3.0-only
 * @link       link(https://www.dootax.com.br,
 *             Build Custom Elementor Widgets)
 * @since      1.0.0
 * php version 7.3.9
 */

namespace ElementorCases\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

// Security Note: Blocks direct access to the plugin PHP files.
defined( 'ABSPATH' ) || die();

/**
 * Cases widget class.
 *
 * @since 1.0.0
 */
class Cases extends Widget_Base {
	/**
	 * Class constructor.
	 *
	 * @param array $data Widget data.
	 * @param array $args Widget arguments.
	 */
	public function __construct( $data = array(), $args = null ) {
		parent::__construct( $data, $args );
        
		wp_register_style( 'style-cases',   plugins_url( '/assets/css/cases.css',            ELEMENTOR_CASES ), [], '1.0.0' );
		wp_register_style( 'style-lity',    plugins_url( '/assets/css/lity.min.css',         ELEMENTOR_CASES ), [], '1.0.0' );
		wp_register_style( 'style-owl',     plugins_url( '/assets/css/owl.carousel.min.css', ELEMENTOR_CASES ), [], '1.0.0' );
		
		wp_register_script( 'script-cases', plugins_url( '/assets/js/cases.js',              ELEMENTOR_CASES ), [ 'elementor-frontend' ], '1.0.0', true );
		wp_register_script( 'script-lity',  plugins_url( '/assets/js/lity.min.js',           ELEMENTOR_CASES ), [ 'elementor-frontend' ], '1.0.0', true );
		wp_register_script( 'script-owl',   plugins_url( '/assets/js/owl.carousel.min.js',   ELEMENTOR_CASES ), [ 'elementor-frontend' ], '1.0.0', true );
	}

	/**
	 * Retrieve the widget name.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'cases';
	}

	/**
	 * Retrieve the widget title.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'Cases', 'elementor-cases' );
	}

	/**
	 * Retrieve the widget icon.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'fa fa-pencil';
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	 *
	 * Used to determine where to display the widget in the editor.
	 *
	 * Note that currently Elementor supports only one category.
	 * When multiple categories passed, Elementor uses the first one.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return array( 'general' );
	}
	
	/**
	 * Enqueue styles.
	 */
	public function get_style_depends() {
		return [
		    'style-cases',
		    'style-lity',
		    'style-owl'
        ];
	}
	
	/**
	 * Enqueue scripts.
	 */
	public function get_script_depends() {
		return [
		    'script-cases',
		    'script-lity',
		    'script-owl'
        ];
	}

	/**
	 * Register the widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	protected function _register_controls() {
		$this->start_controls_section(
			'section_content',
			[
				'label' => __( 'Cases', 'elementor-cases' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);
		
		
        $repeater = new \Elementor\Repeater();
        
        $repeater->add_control(
			'name',
			[
				'label'   => __( 'Nome Completo', 'elementor-cases-carousel' ),
				'type'    => Controls_Manager::TEXT,
			]
		);
		
        $repeater->add_control(
			'job_title',
			[
				'label'   => __( 'Cargo', 'elementor-cases-carousel' ),
				'type'    => Controls_Manager::TEXT,
			]
		);

        $repeater->add_control(
			'soluction',
			[
				'label'   => __( 'Solução', 'elementor-cases-carousel' ),
				'type'    => Controls_Manager::TEXT,
			]
		);

        $repeater->add_control(
			'testimonial',
			[
				'label'   => __( 'Depoimento', 'elementor-cases-carousel' ),
				'type'    => Controls_Manager::TEXTAREA,
			]
		);

        
        $repeater->add_control(
			'url_video',
			[
				'label'       => __( 'Link do vídeo', 'elementor-cases-carousel' ),
				'type'        => Controls_Manager::TEXT,
			]
		);
		
		$repeater->add_control(
			'image_testimonial',
			[
				'label'   => __( 'Imagem da capa', 'elementor-cases-carousel' ),
				'type'    => Controls_Manager::MEDIA,
                /*'default' => [ 'url' => Utils::get_placeholder_image_src() ],*/
			]
		);
        
        $this->add_control(
            'list',
            [
                'label'   => __('Itens', 'cc'),
                'type'    => Controls_Manager::REPEATER,
                'fields'  => $repeater->get_controls(),
                'default' => [
                    [
                        'name'        => __( 'Dona Katarina',         'elementor-cases-carousel' ),
                        'job_title'   => __( 'Designer',              'elementor-cases-carousel' ),
                        'soluction'   => __( 'Pagamento de Tributos', 'elementor-cases-carousel' ),
                        'testimonial' => __( 'Lorem ipsum dolor sit amet, tpat dictum purus, at malesuada tellus convallis et.', 'elementor-cases-carousel' ),
                        'url_video'   => __( 'https://www.youtube.com/watch?v=sw7CJy6jzi8' ),
                    ],
                    [
                        'name'        => __( 'Irmão do Jorel',        'elementor-cases-carousel' ),
                        'job_title'   => __( 'Gestor de Marketing',   'elementor-cases-carousel' ),
                        'soluction'   => __( 'Gestão de Certidões',   'elementor-cases-carousel' ),
                        'testimonial' => __( 'Lorem ipsum dolor sit amet, tpat dictum purus, at malesuada tellus convallis et.', 'elementor-cases-carousel' ),
                        'url_video'   => __( 'https://www.youtube.com/watch?v=sw7CJy6jzi8' ),
                    ],
                    [
                        'name'        => __( 'Frederico',             'elementor-cases-carousel' ),
                        'job_title'   => __( 'Analista de RH',        'elementor-cases-carousel' ),
                        'soluction'   => __( 'Respositório DFe',      'elementor-cases-carousel' ),
                        'testimonial' => __( 'Lorem ipsum dolor sit amet, tpat dictum purus, at malesuada tellus convallis et.', 'elementor-cases-carousel' ),
                        'url_video'   => __( 'https://www.youtube.com/watch?v=sw7CJy6jzi8' ),
                    ],
                ],
                'title_field' => '{{{ name }}}',
            ]
        );

        $this->end_controls_section();
	}

	/**
	 * Render the widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	protected function render() {
		$settings = $this->get_settings_for_display();
		
		if ( $settings['list'] ) {
?>
            <div class="box-case loop owl-carousel owl-theme owl-loaded owl-drag">

    			<?php foreach (  $settings['list'] as $item ) { ?>

    			    <div class="item-case">
                        <div class="box-img">
                            <span class="soluction"><?=$item["soluction"];?></span>
                            <img src="<?=$item["image_testimonial"]['url'];?>" alt="<?=$item["name"];?>" class="img-testimonial" />
                            <a href="<?=$item["url_video"];?>" data-lity>
                                <img src="<?=plugin_dir_url( __DIR__ );?>/assets/img/icon_play_case.svg" alt="Icon - Play" class="icon-play" />
                            </a>
                        </div>
                        <div class="box-content">
                            <h4 class="name"><?=$item["name"];?></h4>
                            <span class="job_title"><?=$item["job_title"];?></span>
                            <p class="testimonial"><?=$item["testimonial"];?></p>
                        </div>
                    </div>

                <?php } ?>

            </div>
<?php
		}
	}

	/**
	 * Render the widget output in the editor.
	 *
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	protected function _content_template() {
?>
		<# if ( settings.list ) { #>
		
		    <div class="box-case loop owl-carousel owl-theme owl-loaded owl-drag">
		        
    			<# _.each( settings.list, function( item, index ) { #>
    			
    			    <div class="item-case">
                        <div class="box-img">
                            <span class="soluction">{{{ item.soluction }}}</span>
                            <img src="{{{ item.image_testimonial.url }}}" alt="{{{ item.name }}}" class="img-testimonial" />
                            <a href="{{{ item.url_video }}}" data-lity>
                                <img src="<?=plugin_dir_url( __DIR__ );?>/assets/img/icon_play_case.svg" alt="Icon - Play" class="icon-play" />
                            </a>
                        </div>
                        <div class="box-content">
                            <h4 class="name">{{{ item.name }}}</h4>
                            <span class="job_title">{{{ item.job_title }}}</span>
                            <p class="testimonial">{{{ item.testimonial }}}</p>
                        </div>
                    </div>

    			<# } );#> 
			
			</div>

		<# } #>
<?php
	}
}
