<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

function isActiveRoute($route, $output = 'active') {

	if ((is_array($route) && in_array(Route::currentRouteName(), $route)) || Route::currentRouteName() == $route) {
		return $output;
	}
}

function enableMenuItemAdmin($routeName) {
	$user = Auth::guard('admin')->user();

	$mapping = [
		'admin.prospection' => function() use( $user ) {
			return $user->id != 33 && ($user->admin === 'S' || $user->consultant === 'S');
		},
		'admin.routineManagement' => function() use( $user ) {
			return $user->id != 33 && ($user->admin === 'S' || $user->consultant === 'S');
		},
		'admin.courseManagement' => function() use( $user ) {
			return $user->id != 33 && ($user->admin === 'S' || $user->consultant === 'S');
		},
		'admin.studentManagement' => function() use( $user ) {
			return $user->admin === 'S' || $user->consultant === 'S';
		},
		'admin.financeManagement' => function() use( $user ) {
			return $user->id != 33 && ($user->admin === 'S' || $user->consultant === 'S');
		},
		'admin.schoolinformation' => function() use( $user ) {
			return $user->id != 33 && ($user->admin === 'S' || $user->consultant === 'S');
		},
		'admin.user' => function() use( $user ) {
			return $user->id != 33 && $user->admin === 'S';
		},
		'admin.profile' => function() use( $user ) {
			return $user->id != 33 && $user->admin === 'S';
		},
		'admin.system_screen' => function() use( $user ) {
			return $user->id != 33 && $user->admin === 'S';
		},
		'admin.testemonial' => function() use( $user ) {
			return $user->id != 33 && $user->admin === 'S';
		},
		'admin.newsletter' => function() use( $user ) {
			return $user->id != 33 && $user->admin === 'S';
		},
		'admin.faq' => function() use( $user ) {
			return $user->id != 33 && $user->admin === 'S';
		},
		'admin.configurationTeam' => function() use( $user ) {
			return $user->id != 33 && $user->admin === 'S';
		},
		'admin.configurationPage' => function() use( $user ) {
			return $user->id != 33 && ($user->admin === 'S' || Auth::user()->author === 'S');
		},
		'admin.blog' => function() use( $user ) {
			return $user->id != 33 && ($user->admin === 'S' || Auth::user()->author === 'S');
		},
		'admin.clinic' => function() use( $user ) {
			return $user->id != 33 && ($user->admin === 'S' || Auth::user()->author === 'S');
		},
	];

	return isset($mapping[$routeName]) ? $mapping[$routeName]() : false;
}
