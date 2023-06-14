<?php

if ( ! class_exists( 'Give_Kindness_Settings' ) ) :

	/**
	 * Gainlove Theme_Settings.
	 *
	 * @sine 1.0.0
	 */
	class Give_Kindness_Settings extends Give_Settings_Page {

		/**
		 * Constructor.
		 *
		 * @since 1.0.0
		 */
		public function __construct() {
			$this->id    = 'givekindness';
			$this->label = __( 'Give Kindness', 'give-kindness' );

			parent::__construct();
		}

		/**
		 * Get settings array.
		 *
		 * @since  1.0.0
		 * @access public
		 *
		 * @return array
		 */
		public function get_settings() {

			$settings = give_kindness_settings();

			/**
			 * Filter the Fee Recovery settings.
			 *
			 * @since  1.0.0
			 *
			 * @param  array $settings
			 */
			$settings = apply_filters( 'givekindness_get_settings_' . $this->id, $settings );

			// Output.
			return $settings;
		}

	}

endif;