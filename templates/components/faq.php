<?php
$faqs = get_field('faq_question_reponses');
render_accordion_section('FAQ', $faqs, 'faq', 'faq-item', 'faq-question-reponses', 'faq-response');
