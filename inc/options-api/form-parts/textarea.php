<textarea 
    rows="8"
    cols="50"
    name="<?php esc_attr_e($args['field_id']); ?>" 
    id="<?php esc_attr_e($args['field_id']); ?>" 
>
    <?php esc_html_e($args['value'] ? $args['value'] : ''); ?>
</textarea>