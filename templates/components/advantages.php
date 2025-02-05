<?php
$advantages = get_field('advantages_title_text');
render_accordion_section('Avantages', $advantages, 'advantages', 'advantages-item', 'advantages-title-text', 'advantages-response');
