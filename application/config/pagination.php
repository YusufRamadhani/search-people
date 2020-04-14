<?php

// this file costumize the pagination from CI to add markup from bootstrap
// the user_guide = https://codeigniter.com/userguide3/libraries/pagination.html?highlight=pagination

$config['base_url'] = base_url() . 'people/index/';

$config['full_tag_open'] = '<nav><ul class="pagination justify-content-center">';
$config['full-tag_close'] = '</ul></nav>';

$config['first_link'] = 'First';
$config['first_tag_open'] = '<div><li class="page-item">';
$config['first_tag_close'] = '</li></div>';

$config['last_link'] = 'Last';
$config['last_tag_open'] = '<div><li class="page-item">';
$config['last_tag_close'] = '</li></div>';

$config['next_link'] = '&raquo'; // Right Arrow QUOte >>
$config['next_tag_open'] = '<div><li class="page-item">';
$config['next_tag_close'] = '</li></div>';

$config['prev_link'] = '&laquo'; // Left Arrow QUOte <<
$config['prev_tag_open'] = '<div><li class="page-item">';
$config['prev_tag_close'] = '</li></div>';

$config['cur_tag_open'] = '<div><li class="page-item active"><a class="page-link" href="#">';
$config['cur_tag_close'] = '</a></li></div>';

$config['num_tag_open'] = '<div><li class="page-item">';
$config['num_tag_close'] = '</li></div>';

$config['attributes'] = array('class' => 'page-link');
