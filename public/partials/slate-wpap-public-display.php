<?php

/**
 * Provide a public-facing view for the plugin
 *
 * This file is used to markup the public-facing aspects of the plugin.
 *
 * @link       https://github.com/shaon-hossain45/
 * @since      1.0.0
 *
 * @package    Slate_Wpap
 * @subpackage Slate_Wpap/public/partials
 */
?>
<?php
if ( ! class_exists( 'PublicBaseSetup' ) ) {
	class PublicBaseSetup {

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string $plugin_name       The name of this plugin.
	 * @param      string $version    The version of this plugin.
	 */
		public function __construct( ) {

			add_shortcode( 'shortcode', array( $this, 'template_shortcode' ) );
		}
/**
	 * Audio update setting
	 *
	 * @return [type] [description]
	 */
	public function template_shortcode( $atts , $content = null ) {

		// Attributes
		$atts = shortcode_atts(
			array(
				'label' => '',
			),
			$atts,
			'shortcode'
		);

		global $wpdb;
		$table_name = $wpdb->prefix . 'wpapaudios'; // do not forget about tables prefix
		$item = $wpdb->get_row( $wpdb->prepare( "SELECT * FROM $table_name WHERE template = %d", $atts['label'] ), ARRAY_A );

		
//var_dump($item);

		// Output
		$output = '';

		$output .='<div id="'.$item['ID'].'" width="100%" class="Boxes__Box-sc-c98zp8-0 goJgHx">
<div display="flex" class="Boxes__Box-sc-c98zp8-0 sc-caiLqq cTsXBC enePwt">
	<h2 font-weight="bold" class="Boxes__Box-sc-c98zp8-0 Textes__Text-sc-hv6g11-0 Headinges__Heading-sc-2igbz0-0 cijqyD dnFFqQ fueCpv">Hip-Hop</h2>
	<div direction="horizontal" class="Boxes__Box-sc-c98zp8-0 styledes__ChipGroup-sc-14zo81j-0 kjMWjy pzTSG">
		<div data-id="tab1" aria-label="" aria-disabled="false" aria-pressed="true" aria-busy="false" role="button" class="Boxes__Box-sc-c98zp8-0 styledes__Chip-sc-iwn7ih-0 evWckn loSPxB bwrXcM">
			<div class="Boxes__Box-sc-c98zp8-0 styledes__Label-sc-iwn7ih-1 styledes__TruncatedLabel-sc-iwn7ih-2 kjMWjy cQYaiz hfdeKa">Preset 1</div>
		</div>
		<div data-id="tab2" aria-label="" aria-disabled="false" aria-pressed="false" aria-busy="false" role="button" class="Boxes__Box-sc-c98zp8-0 styledes__Chip-sc-iwn7ih-0 evWckn loSPxB">
			<div class="Boxes__Box-sc-c98zp8-0 styledes__Label-sc-iwn7ih-1 styledes__TruncatedLabel-sc-iwn7ih-2 kjMWjy cQYaiz hfdeKa">Preset 2</div>
		</div>
		<div data-id="tab3" aria-label="" aria-disabled="false" aria-pressed="false" aria-busy="false" role="button" class="Boxes__Box-sc-c98zp8-0 styledes__Chip-sc-iwn7ih-0 evWckn loSPxB"><div class="Boxes__Box-sc-c98zp8-0 styledes__Label-sc-iwn7ih-1 styledes__TruncatedLabel-sc-iwn7ih-2 kjMWjy cQYaiz hfdeKa">Preset 3</div>
	</div>
	</div>
	<div class="Boxes__Box-sc-c98zp8-0 dTIbbW"><span font-weight="bold" class="Boxes__Box-sc-c98zp8-0 Textes__Text-sc-hv6g11-0 kXTa-dH klUNet">Hi-Fi</span><p class="Boxes__Box-sc-c98zp8-0 Textes__Text-sc-hv6g11-0 Paragraphes__Paragraph-sc-tg8lrm-0 hOMQsu pGoms Vhpvz">Modern and detailed, cutting without harshness.</p></div>
	<div width="100%" display="flex" class="Boxes__Box-sc-c98zp8-0 hmYvbx">
<div class="music-container" id="music-container">
<div id="waveform" style="margin-left: 45px;"></div>
  <div class="music-info">
    <h4 id="title"></h4>
    <div class="progress-container" id="progress-container">
      <div class="progress" id="progress"></div>
    </div>
  </div>

  <audio src="'. $item['audio_file'] .'" id="audio"></audio>

  <div class="img-container">
    <img src="'. plugin_dir_url( dirname( __FILE__ ) ) . 'images/summer.jpg" alt="music-cover" id="cover" />
  </div>
  <div class="navigation">
    <button id="play" class="action-btn action-btn-big">
      <i class="fas fa-play"></i>
    </button>
  </div>
</div>
    </div>
    <label class="Boxes__Box-sc-c98zp8-0 styledes__ComponentWrapper-sc-1uhtj7h-0 kjMWjy ijwRcr">
    <input type="checkbox" aria-checked="true" class="Boxes__Box-sc-c98zp8-0 VisuallyHiddenes__VisuallyHidden-sc-1m0cq66-0 kjMWjy cArTYD">
    <div class="Boxes__Box-sc-c98zp8-0 styledes__OffLabel-sc-1uhtj7h-4 evWckn dgPvYb">Original</div>
    <div class="Boxes__Box-sc-c98zp8-0 styledes__OuterSwitch-sc-1uhtj7h-3 evWckn ljqiUU">
    <div class="Boxes__Box-sc-c98zp8-0 styledes__InnerSwitch-sc-1uhtj7h-1 evWckn gxTSWG">
    <div class="Boxes__Box-sc-c98zp8-0 styledes__Handle-sc-1uhtj7h-2 evWckn bMyBW">
    </div>
    </div>
    </div>
    <div class="Boxes__Box-sc-c98zp8-0 styledes__OnLabel-sc-1uhtj7h-5 evWckn dOBmKM">Processed</div>
    </label>
</div>
</div>';
		// Return code
		return $output;

	}
    
}
}