<h3 class="m-b"><span><?php esc_html_e('Colors'); ?></span></h3>
<p class="no-m-t text-sm">
	<label>
		<input name="<?php esc_attr_e($this->setting->setting_name); ?>[use-default-color]" type="checkbox" <?php if ($this->setting->get_setting('use-default-color') == true) echo 'checked="checked" '; ?>> 
		<?php esc_html_e('Use default color'); ?>
	</label>
</p>
<div class="box">
	<h4 class="active"><span><?php esc_html_e('Default colors'); ?></span></h4>
	<div class="box-body b-t hide show">
		<div class="color-selector">
			<label class="ui-check ui-check-color ui-check-lg">
				<input name="<?php esc_attr_e($this->setting->setting_name); ?>[default-color]" type="radio" value="default" <?php if ($this->setting->get_setting('default-color') == 'default') echo 'checked="checked" '; ?>>
				<i style="background-color: #53a6fa"></i>
			</label>
			<label class="ui-check ui-check-color ui-check-lg">
				<input name="<?php esc_attr_e($this->setting->setting_name); ?>[default-color]" type="radio" value="black" <?php if ($this->setting->get_setting('default-color') == 'black') echo 'checked="checked" '; ?>>
				<i style="background-color: #000"></i>
			</label>
			<label class="ui-check ui-check-color ui-check-lg">
				<input name="<?php esc_attr_e($this->setting->setting_name); ?>[default-color]" type="radio" value="white" <?php if ($this->setting->get_setting('default-color') == 'white') echo 'checked="checked" '; ?>>
				<i style="background-color: #f1f1f1"></i>
			</label>
		</div>
	</div>
</div>
<div class="box">
	<h4 class="b-b"><span><?php esc_html_e('Global'); ?></span></h4>
	<div class="box-body b-b hide">
		<div class="color-picker">
			<p>
				<label><?php esc_html_e('Base color'); ?></label>
				<input name="<?php esc_attr_e($this->setting->setting_name); ?>[color][base-color]" value="<?php esc_html_e( $this->setting->get_setting('color', 'base-color')); ?>" type="text" class="widefat color-field" placeholder="#f1f1f1">
			</p>
			<p>
				<label><?php esc_html_e('Text color'); ?></label>
				<input name="<?php esc_attr_e($this->setting->setting_name); ?>[color][text-color]" value="<?php esc_html_e( $this->setting->get_setting('color', 'text-color')); ?>" type="text" class="widefat color-field" placeholder="#f1f1f1">
			</p>
			<p>
				<label><?php esc_html_e('Icon color'); ?></label>
				<input name="<?php esc_attr_e($this->setting->setting_name); ?>[color][icon-color]" value="<?php esc_html_e( $this->setting->get_setting('color', 'icon-color')); ?>" type="text" class="widefat color-field" placeholder="#f1f1f1">
			</p>

			<p>
				<label><?php esc_html_e('Highlight color'); ?></label>
				<input name="<?php esc_attr_e($this->setting->setting_name); ?>[color][highlight-color]" value="<?php esc_html_e( $this->setting->get_setting('color', 'highlight-color')); ?>" type="text" class="widefat color-field" placeholder="#f1f1f1">
			</p>

			<p>
				<label><?php esc_html_e('Notification color'); ?></label>
				<input name="<?php esc_attr_e($this->setting->setting_name); ?>[color][notification-color]" value="<?php esc_html_e( $this->setting->get_setting('color','notification-color')); ?>" type="text" class="widefat color-field" placeholder="#f1f1f1">
			</p>

			<p>
				<label><?php esc_html_e('Body background'); ?></label>
				<input name="<?php esc_attr_e($this->setting->setting_name); ?>[color][body-background]" value="<?php esc_html_e( $this->setting->get_setting('color','body-background')); ?>" type="text" class="widefat color-field" placeholder="#f1f1f1">
			</p>

			<p>
				<label><?php esc_html_e('Link color'); ?></label>
				<input name="<?php esc_attr_e($this->setting->setting_name); ?>[color][link]" value="<?php esc_html_e( $this->setting->get_setting('color','link')); ?>" type="text" class="widefat color-field" placeholder="#f1f1f1">
			</p>

			<p>
				<label><?php esc_html_e('Form checked'); ?></label>
				<input name="<?php esc_attr_e($this->setting->setting_name); ?>[color][form-checked]" value="<?php esc_html_e( $this->setting->get_setting('color','form-checked')); ?>" type="text" class="widefat color-field" placeholder="#f1f1f1">
			</p>

			<p>
				<label><?php esc_html_e('Button color'); ?></label>
				<input name="<?php esc_attr_e($this->setting->setting_name); ?>[color][button-color]" value="<?php esc_html_e( $this->setting->get_setting('color','button-color')); ?>" type="text" class="widefat color-field" placeholder="#f1f1f1">
			</p>

			<p>
				<label><?php esc_html_e('Secondary button color'); ?></label>
				<input name="<?php esc_attr_e($this->setting->setting_name); ?>[color][button-secondary]" value="<?php esc_html_e( $this->setting->get_setting('color','button-secondary')); ?>" type="text" class="widefat color-field" placeholder="#f1f1f1">
			</p>

			<p>
				<label><?php esc_html_e('Secondary button text'); ?></label>
				<input name="<?php esc_attr_e($this->setting->setting_name); ?>[color][button-secondary-text]" value="<?php esc_html_e( $this->setting->get_setting('color','button-secondary-text')); ?>" type="text" class="widefat color-field" placeholder="#f1f1f1">
			</p>
		</div>
	</div>
	<h4 class="b-b active"><span><?php esc_html_e('Menu'); ?></span></h4>
	<div class="box-body b-b hide">
		<div class="color-picker">
			<p>
				<label><?php esc_html_e('Menu text color'); ?></label>
				<input name="<?php esc_attr_e($this->setting->setting_name); ?>[color][menu-text]" value="<?php esc_html_e( $this->setting->get_setting('color','menu-text')); ?>" type="text" class="widefat color-field" placeholder="#f1f1f1">
			</p>
			<p>
				<label><?php esc_html_e('Menu icon color'); ?></label>
				<input name="<?php esc_attr_e($this->setting->setting_name); ?>[color][menu-icon]" value="<?php esc_html_e( $this->setting->get_setting('color','menu-icon')); ?>" type="text" class="widefat color-field" placeholder="#f1f1f1">
			</p>
			<p>
				<label><?php esc_html_e('Menu background'); ?></label>
				<input name="<?php esc_attr_e($this->setting->setting_name); ?>[color][menu-background]" value="<?php esc_html_e( $this->setting->get_setting('color','menu-background')); ?>" type="text" class="widefat color-field" placeholder="#f1f1f1">
			</p>

			<p>
				<label><?php esc_html_e('Menu highlight text color'); ?></label>
				<input name="<?php esc_attr_e($this->setting->setting_name); ?>[color][menu-highlight-text]" value="<?php esc_html_e( $this->setting->get_setting('color','menu-highlight-text')); ?>" type="text" class="widefat color-field" placeholder="#f1f1f1">
			</p>
			<p>
				<label><?php esc_html_e('Menu highlight icon color'); ?></label>
				<input name="<?php esc_attr_e($this->setting->setting_name); ?>[color][menu-highlight-icon]" value="<?php esc_html_e( $this->setting->get_setting('color','menu-highlight-icon')); ?>" type="text" class="widefat color-field" placeholder="#f1f1f1">
			</p>
			<p>
				<label><?php esc_html_e('Menu highlight background'); ?></label>
				<input name="<?php esc_attr_e($this->setting->setting_name); ?>[color][menu-highlight-background]" value="<?php esc_html_e( $this->setting->get_setting('color','menu-highlight-background')); ?>" type="text" class="widefat color-field" placeholder="#f1f1f1">
			</p>

			<p>
				<label><?php esc_html_e('Menu current text color'); ?></label>
				<input name="<?php esc_attr_e($this->setting->setting_name); ?>[color][menu-current-text]" value="<?php esc_html_e( $this->setting->get_setting('color','menu-current-text')); ?>" type="text" class="widefat color-field" placeholder="#f1f1f1">
			</p>
			<p>
				<label><?php esc_html_e('Menu current icon color'); ?></label>
				<input name="<?php esc_attr_e($this->setting->setting_name); ?>[color][menu-current-icon]" value="<?php esc_html_e( $this->setting->get_setting('color','menu-current-icon')); ?>" type="text" class="widefat color-field" placeholder="#f1f1f1">
			</p>
			<p>
				<label><?php esc_html_e('Menu current background'); ?></label>
				<input name="<?php esc_attr_e($this->setting->setting_name); ?>[color][menu-current-background]" value="<?php esc_html_e( $this->setting->get_setting('color','menu-current-background')); ?>" type="text" class="widefat color-field" placeholder="#f1f1f1">
			</p>

			<p>
				<label><?php esc_html_e('Submenu text color'); ?></label>
				<input name="<?php esc_attr_e($this->setting->setting_name); ?>[color][menu-submenu-text]" value="<?php esc_html_e( $this->setting->get_setting('color','menu-submenu-text')); ?>" type="text" class="widefat color-field" placeholder="#f1f1f1">
			</p>
			<p>
				<label><?php esc_html_e('Submenu focus text color'); ?></label>
				<input name="<?php esc_attr_e($this->setting->setting_name); ?>[color][menu-submenu-focus-text]" value="<?php esc_html_e( $this->setting->get_setting('color','menu-submenu-focus-text')); ?>" type="text" class="widefat color-field" placeholder="#f1f1f1">
			</p>
			<p>
				<label><?php esc_html_e('Submenu current text color'); ?></label>
				<input name="<?php esc_attr_e($this->setting->setting_name); ?>[color][menu-submenu-current-text]" value="<?php esc_html_e( $this->setting->get_setting('color','menu-submenu-current-text')); ?>" type="text" class="widefat color-field" placeholder="#f1f1f1">
			</p>
			<p>
				<label><?php esc_html_e('Submenu background'); ?></label>
				<input name="<?php esc_attr_e($this->setting->setting_name); ?>[color][menu-submenu-background]" value="<?php esc_html_e( $this->setting->get_setting('color','menu-submenu-background')); ?>" type="text" class="widefat color-field" placeholder="#f1f1f1">
			</p>

			<p>
				<label><?php esc_html_e('Bubble text color'); ?></label>
				<input name="<?php esc_attr_e($this->setting->setting_name); ?>[color][menu-bubble-text]" value="<?php esc_html_e( $this->setting->get_setting('color','menu-bubble-text')); ?>" type="text" class="widefat color-field" placeholder="#f1f1f1">
			</p>
			<p>
				<label><?php esc_html_e('Bubble background'); ?></label>
				<input name="<?php esc_attr_e($this->setting->setting_name); ?>[color][menu-bubble-background]" value="<?php esc_html_e( $this->setting->get_setting('color','menu-bubble-background')); ?>" type="text" class="widefat color-field" placeholder="#f1f1f1">
			</p>
			<p>
				<label><?php esc_html_e('Bubble current text color'); ?></label>
				<input name="<?php esc_attr_e($this->setting->setting_name); ?>[color][menu-bubble-current-text]" value="<?php esc_html_e( $this->setting->get_setting('color','menu-bubble-current-text')); ?>" type="text" class="widefat color-field" placeholder="#f1f1f1">
			</p>
			<p>
				<label><?php esc_html_e('Bubble current background'); ?></label>
				<input name="<?php esc_attr_e($this->setting->setting_name); ?>[color][menu-bubble-current-background]" value="<?php esc_html_e( $this->setting->get_setting('color','menu-bubble-current-background')); ?>" type="text" class="widefat color-field" placeholder="#f1f1f1">
			</p>

			<p>
				<label><?php esc_html_e('Collapse text color'); ?></label>
				<input name="<?php esc_attr_e($this->setting->setting_name); ?>[color][menu-collapse-text]" value="<?php esc_html_e( $this->setting->get_setting('color','menu-collapse-text')); ?>" type="text" class="widefat color-field" placeholder="#f1f1f1">
			</p>
			<p>
				<label><?php esc_html_e('Collapse icon color'); ?></label>
				<input name="<?php esc_attr_e($this->setting->setting_name); ?>[color][menu-collapse-icon]" value="<?php esc_html_e( $this->setting->get_setting('color','menu-collapse-icon')); ?>" type="text" class="widefat color-field" placeholder="#f1f1f1">
			</p>
			<p>
				<label><?php esc_html_e('Collapse focus text color'); ?></label>
				<input name="<?php esc_attr_e($this->setting->setting_name); ?>[color][menu-collapse-focus-text]" value="<?php esc_html_e( $this->setting->get_setting('color','menu-collapse-focus-text')); ?>" type="text" class="widefat color-field" placeholder="#f1f1f1">
			</p>
			<p>
				<label><?php esc_html_e('Collapse focus icon color'); ?></label>
				<input name="<?php esc_attr_e($this->setting->setting_name); ?>[color][menu-collapse-focus-icon]" value="<?php esc_html_e( $this->setting->get_setting('color','menu-collapse-focus-icon')); ?>" type="text" class="widefat color-field" placeholder="#f1f1f1">
			</p>
		</div>
	</div>
	<h4><span><?php esc_html_e('Bar'); ?></span></h4>
	<div class="box-body b-t hide">
		<div class="color-picker">
			<p>
				<label><?php esc_html_e('Bar text color'); ?></label>
				<input name="<?php esc_attr_e($this->setting->setting_name); ?>[bar][menu-text]" value="<?php esc_html_e( $this->setting->get_setting('bar','menu-text')); ?>" type="text" class="widefat color-field" placeholder="#f1f1f1">
			</p>
			<p>
				<label><?php esc_html_e('Bar icon color'); ?></label>
				<input name="<?php esc_attr_e($this->setting->setting_name); ?>[bar][menu-icon]" value="<?php esc_html_e( $this->setting->get_setting('bar','menu-icon')); ?>" type="text" class="widefat color-field" placeholder="#f1f1f1">
			</p>
			<p>
				<label><?php esc_html_e('Bar highlight icon color'); ?></label>
				<input name="<?php esc_attr_e($this->setting->setting_name); ?>[bar][menu-highlight-icon]" value="<?php esc_html_e( $this->setting->get_setting('bar','menu-highlight-icon')); ?>" type="text" class="widefat color-field" placeholder="#f1f1f1">
			</p>
			<p>
				<label><?php esc_html_e('Bar background'); ?></label>
				<input name="<?php esc_attr_e($this->setting->setting_name); ?>[bar][menu-background]" value="<?php esc_html_e( $this->setting->get_setting('bar','menu-background')); ?>" type="text" class="widefat color-field" placeholder="#f1f1f1">
			</p>
			<p>
				<label><?php esc_html_e('Bar submemu text'); ?></label>
				<input name="<?php esc_attr_e($this->setting->setting_name); ?>[bar][menu-submenu-text]" value="<?php esc_html_e( $this->setting->get_setting('bar','menu-submenu-text')); ?>" type="text" class="widefat color-field" placeholder="#f1f1f1">
			</p>
			<p>
				<label><?php esc_html_e('Bar submemu focus text'); ?></label>
				<input name="<?php esc_attr_e($this->setting->setting_name); ?>[bar][menu-submenu-focus-text]" value="<?php esc_html_e( $this->setting->get_setting('bar','menu-submenu-focus-text')); ?>" type="text" class="widefat color-field" placeholder="#f1f1f1">
			</p>
			<p>
				<label><?php esc_html_e('Bar submenu background'); ?></label>
				<input name="<?php esc_attr_e($this->setting->setting_name); ?>[bar][menu-submenu-background]" value="<?php esc_html_e( $this->setting->get_setting('bar','menu-submenu-background')); ?>" type="text" class="widefat color-field" placeholder="#f1f1f1">
			</p>
			<p>
				<label><?php esc_html_e('Avatar frame'); ?></label>
				<input name="<?php esc_attr_e($this->setting->setting_name); ?>[bar][adminbar-avatar-frame]" value="<?php esc_html_e( $this->setting->get_setting('bar','adminbar-avatar-frame')); ?>" type="text" class="widefat color-field" placeholder="#f1f1f1">
			</p>
			<p>
				<label><?php esc_html_e('Input background'); ?></label>
				<input name="<?php esc_attr_e($this->setting->setting_name); ?>[bar][adminbar-input-background]" value="<?php esc_html_e( $this->setting->get_setting('bar','adminbar-input-background')); ?>" type="text" class="widefat color-field" placeholder="#f1f1f1">
			</p>
		</div>
	</div>
</div>
