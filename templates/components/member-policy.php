<?php
$member_policy = get_field('member_policy_content');
render_accordion_section('Politique aux membres', $member_policy, 'members-policy', 'members-policy-item', 'members-policy-title-text', 'members-policy-response');
