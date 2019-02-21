<?php

function themethreads_responsive_css() {
	
	$css = '';
	
	$min_media_mobile_nav = themethreads_helper()->get_option( 'media-mobile-nav' ) + 1;
	$max_media_mobile_nav = themethreads_helper()->get_option( 'media-mobile-nav' );
	
	$site_layout = themethreads_helper()->get_option( 'page-layout' );
	$site_width  = themethreads_helper()->get_option( 'site-width' );
	$site_width_media  = themethreads_helper()->get_option( 'site-width' ) + 30;
	
	if( 'boxed' === $site_layout ) {
		$css = "@media screen and ( min-width: {$site_width_media}px ) {

					.is-stuck,
					.footer-stuck,
					#wrap {
						max-width: {$site_width}px;
						margin: 0 auto;
					}
					.main-header .container-fluid,
					.main-header .container,
					.container {
						width: 100%;
						max-width: 100%;
					}
					.main-footer .vc_row,
					.content .vc_row {
						padding-left: 15px;
						padding-right: 15px;
					}
				}";
	}
	else {
		$css = "@media screen and ( min-width: {$site_width_media}px ) {

					.main-header .container {
						max-width: {$site_width}px;
					}
					.container {
						width: {$site_width}px;
					}
				}";
	}	
	
	$css .= "@media screen and (min-width: {$min_media_mobile_nav}px) {
			  .header-side {
			    width: 375px;
			    height: 100vh;
			    position: fixed;
			    top: 0;
			    left: 0;
			  }
			  .header-side .mainbar,
			  .header-side .mainbar-container,
			  .header-side .mainbar-row,
			  .header-side .mainbar-wrap {
			    width: 100%;
			    height: 100%;
			  }
			  .header-side .mainbar-wrap {
			    padding: 12vh 50px;
			    overflow: hidden;
			    position: relative;
			  }
			  .header-side .mainbar {
			    overflow: hidden;
			  }
			  .header-side .mainbar-row {
			    width: calc(100% + 20px);
			    margin: 0;
			    flex-direction: column;
			    justify-content: space-between;
			    overflow-x: hidden;
			    overflow-y: auto;
			  }
			  .header-side .mainbar-row > [class^=col] {
			    padding: 0;
			    margin: 30px 0;
			    align-items: flex-start;
			    justify-content: center;
			    flex-direction: column;
			    flex: 1 auto;
			  }
			  .header-side .mainbar-row > [class^=col]:first-child {
			    margin-top: 0;
			  }
			  .header-side .mainbar-row > [class^=col]:last-child {
			    margin-bottom: 0;
			    align-items: flex-start;
			    justify-content: flex-end;
			  }
			  .header-side .mainbar-row > [class^=col]:last-child .header-module {
			    align-items: flex-end;
			  }
			  .header-side .navbar-header {
			    align-items: flex-start;
			  }
			  .header-side .navbar-brand {
			    padding: 0;
			  }
			  .header-side .navbar-collapse {
			    width: 100%;
			    overflow: hidden !important;
			  }
			  .header-side .main-nav {
			    width: calc(100% + 25px);
			    padding-right: 25px;
			    display: block;
			    overflow-x: hidden;
			    overflow-y: auto;
			  }
			  .header-side .main-nav > li {
			    align-items: flex-start;
			  }
			  .header-side .main-nav > li > a {
			    display: block;
			    width: 100%;
			    padding-left: 0;
			  }
			  .header-side .nav-item-children {
			    padding-right: 15px;
			  }
			  .header-side .header-module {
			    margin-bottom: 15px;
			    margin-left: 0 !important;
			  }
			  .header-side .header-module > h1,
			  .header-side .header-module > h2,
			  .header-side .header-module > h3,
			  .header-side .header-module > h4,
			  .header-side .header-module > h5,
			  .header-side .header-module > h6 {
			    margin-top: 0;
			    margin-bottom: 0.25em;
			  }
			  .header-side .ld-module-dropdown,
			  .header-side .ld-dropdown-menu-content {
			    background: none;
			  }
			  .header-side .ld-dropdown-menu-content {
			    margin-top: 1em;
			    width: auto;
			    padding: 0;
			    border: none;
			  }
			  .header-side .ld-module-search .ld-module-trigger {
			    -webkit-transform: translateX(0);
			            transform: translateX(0);
			    transition: -webkit-transform 0.45s cubic-bezier(0.86, 0, 0.07, 1);
			    transition: transform 0.45s cubic-bezier(0.86, 0, 0.07, 1);
			    transition: transform 0.45s cubic-bezier(0.86, 0, 0.07, 1), -webkit-transform 0.45s cubic-bezier(0.86, 0, 0.07, 1);
			  }
			  .header-side .ld-module-search .ld-module-trigger.collapse {
			    -webkit-transform: translateX(-100%);
			            transform: translateX(-100%);
			  }
			  .header-side .ld-module-search .ld-search-form-container {
			    -webkit-transform: translateX(-100%);
			            transform: translateX(-100%);
			    transition: -webkit-transform 0.45s cubic-bezier(0.86, 0, 0.07, 1);
			    transition: transform 0.45s cubic-bezier(0.86, 0, 0.07, 1);
			    transition: transform 0.45s cubic-bezier(0.86, 0, 0.07, 1), -webkit-transform 0.45s cubic-bezier(0.86, 0, 0.07, 1);
			  }
			  .header-side .ld-module-search .ld-module-dropdown {
			    width: 250px;
			    height: auto !important;
			    top: 0;
			    left: 0;
			    right: auto;
			    overflow: hidden;
			  }
			  .header-side .ld-module-search .ld-module-dropdown[aria-expanded=true] .ld-search-form-container {
			    -webkit-transform: translateX(0);
			            transform: translateX(0);
			  }
			  .header-side .ld-search-form-container {
			    width: auto;
			    padding: 0;
			    border: none;
			  }
			  .header-side-style-1 .navbar-collapse {
			    flex-direction: column;
			    justify-content: center;
			    width: 375px;
			    height: 100vh !important;
			    position: fixed;
			    top: 0;
			    left: 0;
			    z-index: 10;
			    -webkit-transform: translateX(-200%);
			            transform: translateX(-200%);
			    background-color: #fdfdfe;
			    box-shadow: 0 0 0 #f0f1f6 inset;
			    transition: all 0.45s cubic-bezier(0.7, 0, 0.2, 1);
			  }
			  .header-side-style-1 .navbar-collapse[aria-expanded=true] {
			    -webkit-transform: translateX(-100%);
			            transform: translateX(-100%);
			    box-shadow: -70px 0 70px #f0f1f6 inset;
			  }
			  .header-side-style-1 .main-nav {
			    flex-grow: 0;
			  }
			  .header-side-style-3 .mainbar-row {
			    flex-direction: row;
			    flex-wrap: wrap;
			  }
			  .header-side-style-3 .mainbar-row > [class^=col] {
			    justify-content: flex-start;
			  }
			  .header-side-style-3 .navbar-header,
			  .header-side-style-3 .header-module,
			  .header-side-style-3 .navbar-collapse {
			    flex: 1 auto;
			  }
			  .header-side-style-3 .navbar-header {
			    margin-bottom: 45px;
			  }
			  .header-side-style-3 .navbar-collapse {
			    margin-bottom: 40px;
			  }
			  .header-fullscreen-style-1 .navbar-fullscreen {
			    width: 100%;
			    height: 100% !important;
			    padding: 10vh 0 15vh;
			    position: fixed;
			    top: 0;
			    left: 0;
			    z-index: 9;
			    opacity: 0;
			    visibility: hidden;
			    background-color: #fff;
			    transition: all 0.3s ease;
			  }
			  .header-fullscreen-style-1 .navbar-fullscreen .main-nav {
			    display: block;
			  }
			  .header-fullscreen-style-1 .navbar-fullscreen .main-nav > li {
			    opacity: 0;
			    visibility: hidden;
			    -webkit-transform: translateY(-25%) rotateX(45deg);
			            transform: translateY(-25%) rotateX(45deg);
			    transition: all 0.45s cubic-bezier(0.23, 1, 0.32, 1);
			  }
			  .header-fullscreen-style-1 .navbar-fullscreen .main-nav > li:nth-child(10) {
			    transition-delay: 0.0588235294s;
			  }
			  .header-fullscreen-style-1 .navbar-fullscreen .main-nav > li:nth-child(9) {
			    transition-delay: 0.1176470588s;
			  }
			  .header-fullscreen-style-1 .navbar-fullscreen .main-nav > li:nth-child(8) {
			    transition-delay: 0.1764705882s;
			  }
			  .header-fullscreen-style-1 .navbar-fullscreen .main-nav > li:nth-child(7) {
			    transition-delay: 0.2352941176s;
			  }
			  .header-fullscreen-style-1 .navbar-fullscreen .main-nav > li:nth-child(6) {
			    transition-delay: 0.2941176471s;
			  }
			  .header-fullscreen-style-1 .navbar-fullscreen .main-nav > li:nth-child(5) {
			    transition-delay: 0.3529411765s;
			  }
			  .header-fullscreen-style-1 .navbar-fullscreen .main-nav > li:nth-child(4) {
			    transition-delay: 0.4117647059s;
			  }
			  .header-fullscreen-style-1 .navbar-fullscreen .main-nav > li:nth-child(3) {
			    transition-delay: 0.4705882353s;
			  }
			  .header-fullscreen-style-1 .navbar-fullscreen .main-nav > li:nth-child(2) {
			    transition-delay: 0.5294117647s;
			  }
			  .header-fullscreen-style-1 .navbar-fullscreen .main-nav > li:nth-child(1) {
			    transition-delay: 0.5882352941s;
			  }
			  .header-fullscreen-style-1 .navbar-fullscreen .main-nav > li > a {
			    padding-left: 0;
			    padding-right: 0;
			  }
			  .header-fullscreen-style-1 .navbar-fullscreen .nav-item-children {
			    text-align: center;
			    box-shadow: none;
			  }
			  .header-fullscreen-style-1 .navbar-fullscreen .nav-item-children > li > a {
			    padding: 0;
			  }
			  .header-fullscreen-style-1 .navbar-fullscreen .nav-item-children > li:hover > a {
			    background-color: transparent;
			  }
			  .header-fullscreen-style-1 .navbar-fullscreen .megamenu .nav-item-children {
			    display: none;
			    visibility: visible;
			    left: auto !important;
			    right: auto !important;
			  }
			  .header-fullscreen-style-1 .navbar-fullscreen .megamenu .ld-container,
			  .header-fullscreen-style-1 .navbar-fullscreen .megamenu .megamenu-column,
			  .header-fullscreen-style-1 .navbar-fullscreen .megamenu .megamenu-container {
			    width: 100% !important;
			  }
			  .header-fullscreen-style-1 .navbar-fullscreen .megamenu section.vc_row {
			    padding: 0 !important;
			  }
			  .header-fullscreen-style-1 .navbar-fullscreen .megamenu .ld-row {
			    display: block;
			  }
			  .header-fullscreen-style-1 .navbar-fullscreen .header-module {
			    align-items: center;
			  }
			  .header-fullscreen-style-1 .navbar-fullscreen[aria-expanded=true] {
			    opacity: 1;
			    visibility: visible;
			  }
			  .header-fullscreen-style-1 .navbar-fullscreen[aria-expanded=true] .main-nav > li {
			    opacity: 1;
			    visibility: visible;
			    -webkit-transform: translateY(0) rotateX(0);
			            transform: translateY(0) rotateX(0);
			  }
			  .navbar-logo-centered .navbar-brand {
			    order: inherit;
			    padding-left: 35px;
			    padding-right: 35px;
			    flex-shrink: 0;
			  }
			  .text-lg-right .header-module {
			    align-items: flex-end;
			  }
			  .text-lg-left .header-module {
			    align-items: flex-start;
			  }
			  .text-lg-center .header-module {
			    align-items: center;
			  }
			  .navbar-collapse ~ .header-module {
			    margin-left: 25px;
			  }
			  .navbar-collapse:not(.navbar-fullscreen) .header-module {
			    display: none;
			  }
			  .nav-trigger.navbar-toggle {
			    display: none;
			  }
			  .ld-search-form .input-icon {
			    pointer-events: none;
			  }
			  .megamenu {
			    position: static !important;
			  }
			  .main-nav:not(.main-nav-side) .megamenu:not(.position-applied) .nav-item-children {
			    display: block !important;
			    visibility: hidden;
			  }
			  .megamenu .container.megamenu-container {
			    padding-left: 15px;
			    padding-right: 15px;
			  }
			  .megamenu .nav-item-children {
			    border-radius: 0;
			    padding-top: 0;
			    padding-bottom: 0;
			    background: none;
			    box-shadow: none;
			  }
			  .megamenu .megamenu-inner-row {
			    background-color: #fff;
			    box-shadow: 0 16px 50px rgba(0, 0, 0, 0.07);
			  }
			  .megamenu .megamenu-inner-row.vc_row {
			    flex-flow: row wrap;
			  }
			  .megamenu .megamenu-inner-row.vc_row:after {
			    content: none;
			  }
			  .megamenu .megamenu-inner-row.vc_row-has-bg:before {
			    background-color: inherit;
			  }
			  .megamenu.megamenu-content-stretch .nav-item-children {
			    left: 0 !important;
			    right: 0 !important;
			  }
			  .megamenu.megamenu-fullwidth .nav-item-children {
			    width: 100vw;
			    max-width: none;
			    left: 50% !important;
			    right: 50% !important;
			    margin-left: -50vw !important;
			    margin-right: -50vw !important;
			  }
			  .megamenu.megamenu-fullwidth .megamenu-container {
			    width: 100vw !important;
			    max-width: none;
			  }
			  .megamenu.position-applied .megamenu-column {
			    flex: 1 auto;
			  }
			  .navbar-header {
			    flex-basis: auto;
			  }
			  .navbar-header .mobile-logo-default,
			  .navbar-header .header-module {
			    display: none;
			  }
			  .navbar-collapse {
			    display: inline-flex !important;
			    flex-direction: column;
			    align-items: stretch;
			    height: auto !important;
			    flex-basis: 0;
			  }
			  .navbar-collapse > .nav-trigger {
			    display: none !important;
			  }
			  .navbar-collapse-clone {
			    display: none !important;
			  }
			  .main-nav {
			    display: flex;
			    align-items: stretch;
			    justify-content: flex-end;
			  }
			  .main-nav > li,
			  .main-nav > li > a {
			    align-items: center;
			  }
			  .main-nav > li:first-child {
			    padding-left: 0;
			  }
			  .main-nav > li:last-child {
			    padding-right: 0;
			  }
			  .main-nav .submenu-expander {
			    display: none !important;
			  }
			  .main-nav-hover-linethrough > li > a .link-ext,
			  .main-nav-hover-underline-1 > li > a .link-ext,
			  .main-nav-hover-underline-3 > li > a .link-ext {
			    display: inline-block;
			    width: 100%;
			    height: 0.0625em;
			    min-height: 1px;
			    position: absolute;
			    bottom: -0.1875em;
			    left: 0;
			    background-color: #000;
			    -webkit-transform-origin: right center;
			            transform-origin: right center;
			    -webkit-transform: scaleX(0);
			            transform: scaleX(0);
			    transition: -webkit-transform 0.25s cubic-bezier(0, 0, 0.2, 1);
			    transition: transform 0.25s cubic-bezier(0, 0, 0.2, 1);
			    transition: transform 0.25s cubic-bezier(0, 0, 0.2, 1), -webkit-transform 0.25s cubic-bezier(0, 0, 0.2, 1);
			  }
			  .main-nav-hover-linethrough > li.active > a .link-ext,
			  .main-nav-hover-linethrough > li.current-menu-item > a .link-ext,
			  .main-nav-hover-linethrough > li > a:hover .link-ext,
			  .main-nav-hover-underline-1 > li.active > a .link-ext,
			  .main-nav-hover-underline-1 > li.current-menu-item > a .link-ext,
			  .main-nav-hover-underline-1 > li > a:hover .link-ext,
			  .main-nav-hover-underline-3 > li.active > a .link-ext,
			  .main-nav-hover-underline-3 > li.current-menu-item > a .link-ext,
			  .main-nav-hover-underline-3 > li > a:hover .link-ext {
			    -webkit-transform-origin: left center;
			            transform-origin: left center;
			    -webkit-transform: scaleX(1);
			            transform: scaleX(1);
			  }
			  .main-nav-hover-linethrough > li > a .link-ext {
			    width: 114%;
			    bottom: 50%;
			    left: -7%;
			    margin-top: -0.0312em;
			  }
			  .main-nav-hover-underline-2 > li > a .link-ext {
			    display: inline-block;
			    width: 107%;
			    height: 0.4em;
			    position: absolute;
			    bottom: 0.25em;
			    left: -3.5%;
			    background: #f4bcba;
			    background: linear-gradient(to right, #f4bc8b 0%, #f1aacc 100%);
			    -webkit-transform: scaleY(0);
			            transform: scaleY(0);
			    -webkit-transform-origin: right top;
			            transform-origin: right top;
			    transition: -webkit-transform 0.3s cubic-bezier(0.23, 1, 0.32, 1);
			    transition: transform 0.3s cubic-bezier(0.23, 1, 0.32, 1);
			    transition: transform 0.3s cubic-bezier(0.23, 1, 0.32, 1), -webkit-transform 0.3s cubic-bezier(0.23, 1, 0.32, 1);
			  }
			  .main-nav-hover-underline-2 > li.active > a .link-ext,
			  .main-nav-hover-underline-2 > li.current-menu-item > a .link-ext,
			  .main-nav-hover-underline-2 > li > a:hover .link-ext {
			    -webkit-transform-origin: center bottom;
			            transform-origin: center bottom;
			    -webkit-transform: scaleY(1);
			            transform: scaleY(1);
			  }
			  .main-nav-hover-underline-3 .link-txt {
			    position: static;
			  }
			  .main-nav-hover-underline-3 > li > a .link-ext {
			    height: 0.214285714285714em;
			    min-height: 2px;
			    width: 100%;
			    left: 0;
			    bottom: 0;
			  }
			  .main-nav-side-style-2 > li > a .link-ext {
			    display: inline-block;
			    width: 0.25em;
			    height: 0.25em;
			    min-width: 4px;
			    min-height: 4px;
			    border-radius: 50em;
			    position: absolute;
			    top: 50%;
			    right: -1em;
			    left: auto;
			    margin-top: -0.12em;
			    background: #181b31;
			    opacity: 0;
			    visibility: hidden;
			    -webkit-transform: translateY(200%);
			            transform: translateY(200%);
			    transition: all 0.3s;
			  }
			  .main-nav-side-style-2 > li.active > a .link-ext,
			  .main-nav-side-style-2 > li.current-menu-item > a .link-ext,
			  .main-nav-side-style-2 > li > a:hover .link-ext {
			    opacity: 1;
			    visibility: visible;
			    -webkit-transform: translateY(0);
			            transform: translateY(0);
			  }
			  .main-nav-hover-fade-inactive:hover > li > a {
			    opacity: 0.35;
			  }
			  .main-nav-hover-fade-inactive:hover > li:hover > a {
			    opacity: 1;
			  }
			  .navbar-visible-ontoggle {
			    padding-right: 5px;
			    padding-left: 5px;
			  }
			  .navbar-visible-ontoggle .main-nav > li {
			    opacity: 0;
			    visibility: hidden;
			    -webkit-transform: translateX(5px);
			            transform: translateX(5px);
			    transition: all 0.3s ease;
			  }
			  .navbar-visible-ontoggle .main-nav > li:nth-child(1) {
			    transition-delay: 0.05s;
			  }
			  .navbar-visible-ontoggle .main-nav > li:nth-child(2) {
			    transition-delay: 0.1s;
			  }
			  .navbar-visible-ontoggle .main-nav > li:nth-child(3) {
			    transition-delay: 0.15s;
			  }
			  .navbar-visible-ontoggle .main-nav > li:nth-child(4) {
			    transition-delay: 0.2s;
			  }
			  .navbar-visible-ontoggle .main-nav > li:nth-child(5) {
			    transition-delay: 0.25s;
			  }
			  .navbar-visible-ontoggle .main-nav > li:nth-child(6) {
			    transition-delay: 0.3s;
			  }
			  .navbar-visible-ontoggle .main-nav > li:nth-child(7) {
			    transition-delay: 0.35s;
			  }
			  .navbar-visible-ontoggle .main-nav > li:nth-child(8) {
			    transition-delay: 0.4s;
			  }
			  .navbar-visible-ontoggle .main-nav > li:nth-child(9) {
			    transition-delay: 0.45s;
			  }
			  .navbar-visible-ontoggle .main-nav > li:nth-child(10) {
			    transition-delay: 0.5s;
			  }
			  .navbar-visible-ontoggle[aria-expanded=true] .main-nav > li {
			    opacity: 1;
			    visibility: visible;
			    -webkit-transform: none;
			            transform: none;
			  }
			  .navbar-visible-ontoggle[aria-expanded=true] .main-nav > li:nth-child(10) {
			    transition-delay: 0.05s;
			  }
			  .navbar-visible-ontoggle[aria-expanded=true] .main-nav > li:nth-child(9) {
			    transition-delay: 0.1s;
			  }
			  .navbar-visible-ontoggle[aria-expanded=true] .main-nav > li:nth-child(8) {
			    transition-delay: 0.15s;
			  }
			  .navbar-visible-ontoggle[aria-expanded=true] .main-nav > li:nth-child(7) {
			    transition-delay: 0.2s;
			  }
			  .navbar-visible-ontoggle[aria-expanded=true] .main-nav > li:nth-child(6) {
			    transition-delay: 0.25s;
			  }
			  .navbar-visible-ontoggle[aria-expanded=true] .main-nav > li:nth-child(5) {
			    transition-delay: 0.3s;
			  }
			  .navbar-visible-ontoggle[aria-expanded=true] .main-nav > li:nth-child(4) {
			    transition-delay: 0.35s;
			  }
			  .navbar-visible-ontoggle[aria-expanded=true] .main-nav > li:nth-child(3) {
			    transition-delay: 0.4s;
			  }
			  .navbar-visible-ontoggle[aria-expanded=true] .main-nav > li:nth-child(2) {
			    transition-delay: 0.45s;
			  }
			  .navbar-visible-ontoggle[aria-expanded=true] .main-nav > li:nth-child(1) {
			    transition-delay: 0.5s;
			  }
			  .navbar-visible-ontoggle[aria-expanded=false].collapsing .main-nav > li {
			    -webkit-transform: translateX(-5px);
			            transform: translateX(-5px);
			  }
			  .main-nav-side {
			    overflow-x: hidden;
			    overflow-y: auto;
			  }
			  .main-nav-side > li, .main-nav-side > li:first-child, .main-nav-side > li:last-child {
			    padding-left: 1.666em;
			    padding-right: 1.666em;
			  }
			  .main-nav-side .nav-item-children {
			    display: none;
			    width: 100%;
			    padding: 0.625em 0 0.625em 0;
			    border-radius: 0;
			    position: relative !important;
			    top: auto !important;
			    left: auto !important;
			    right: auto !important;
			    background-color: transparent;
			    box-shadow: none;
			    font-size: 16px;
			    line-height: 1.5em;
			    overflow-x: hidden;
			    overflow-y: auto;
			  }
			  .main-nav-side .nav-item-children > li {
			    display: block;
			    width: 100%;
			    font-size: 1em;
			    font-weight: 400;
			  }
			  .main-nav-side .nav-item-children > li > a {
			    padding: 0.75em 1.25em;
			  }
			  .main-nav-side .nav-item-children > li:hover > a {
			    background-color: transparent;
			  }
			  .main-nav-side .nav-item-children .nav-item-children {
			    padding-left: 1.25em;
			  }
			  .main-nav-side .megamenu .nav-item-children {
			    display: none;
			    padding-left: 1.25em;
			    width: auto !important;
			    left: auto !important;
			    right: auto !important;
			    margin-left: 0 !important;
			    margin-right: 0 !important;
			    visibility: visible;
			  }
			  .main-nav-side .megamenu .ld-container,
			  .main-nav-side .megamenu .megamenu-column,
			  .main-nav-side .megamenu .megamenu-container {
			    width: 100% !important;
			    padding: 0;
			  }
			  .main-nav-side .megamenu section.vc_row {
			    padding: 0 !important;
			  }
			  .main-nav-side .megamenu .vc_row,
			  .main-nav-side .megamenu .vc_column-inner,
			  .main-nav-side .megamenu .megamenu-column,
			  .main-nav-side .megamenu .wpb_wrapper {
			    background: none !important;
			    border: none !important;
			    padding: 0 !important;
			    margin: 0 !important;
			    box-shadow: none !important;
			  }
			  .main-nav-side .megamenu .ld-row {
			    display: block;
			    margin: 0;
			  }
			  .main-nav-side .megamenu .megamenu-inner-row:before {
			    content: none !important;
			  }
			  .main-nav-side-style-1 > li, .main-nav-side-style-1 > li:first-child, .main-nav-side-style-1 > li:last-child {
			    padding-left: 50px;
			    padding-right: 50px;
			  }
			  .main-nav-side-style-2 > li {
			    padding-left: 0 !important;
			    padding-right: 0 !important;
			  }
			  .main-nav-fullscreen-style-1 {
			    width: 50%;
			    margin: 5vh auto;
			    align-items: center;
			    justify-content: center;
			    overflow-x: hidden;
			    overflow-y: auto;
			    text-align: center;
			  }
			  .main-nav-fullscreen-style-1 > li {
			    padding-left: 0 !important;
			    padding-right: 0 !important;
			    margin-bottom: 1em;
			    overflow: hidden;
			  }
			  .main-nav-fullscreen-style-1 > li > a {
			    width: 100%;
			    justify-content: center;
			  }
			  .main-nav-fullscreen-style-1 .nav-item-children {
			    width: calc(100% + 24px);
			    padding: 0.625em 0;
			    position: relative;
			    top: auto;
			    left: auto;
			    font-size: 16px;
			    line-height: 1.5em;
			    overflow-x: hidden;
			    overflow-y: auto;
			  }
			  .main-nav-fullscreen-style-1 .nav-item-children > li {
			    display: block;
			    width: 100%;
			    padding: 0.75em 1.25em;
			    font-size: 1em;
			    font-weight: 400;
			  }
			  .main-header[data-react-to-megamenu=true] .mainbar-wrap .megamenu-hover-bg {
			    display: inline-block;
			    width: 100%;
			    height: 100%;
			    position: absolute;
			    top: 0;
			    left: 0;
			    opacity: 0;
			    transition: opacity 0.3s cubic-bezier(0.02, 0.01, 0.47, 1);
			  }
			  .main-header[data-react-to-megamenu=true].megamenu-item-active .megamenu-hover-bg {
			    opacity: 1;
			  }
			  .main-header[data-react-to-megamenu=true].megamenu-scheme-light .mainbar-wrap:not(.is-stuck) .social-icon a {
			    color: rgba(0, 0, 0, 0.7) !important;
			  }
			  .main-header[data-react-to-megamenu=true].megamenu-scheme-light .mainbar-wrap:not(.is-stuck) .social-icon a:hover {
			    color: #000 !important;
			  }
			  .main-header[data-react-to-megamenu=true].megamenu-scheme-light .mainbar-wrap:not(.is-stuck) .header-module .ld-module-trigger,
			  .main-header[data-react-to-megamenu=true].megamenu-scheme-light .mainbar-wrap:not(.is-stuck) .main-nav > li > a {
			    color: rgba(0, 0, 0, 0.7);
			  }
			  .main-header[data-react-to-megamenu=true].megamenu-scheme-light .mainbar-wrap:not(.is-stuck) .header-module .ld-module-trigger:hover,
			  .main-header[data-react-to-megamenu=true].megamenu-scheme-light .mainbar-wrap:not(.is-stuck) .main-nav > li > a:hover {
			    color: #000;
			  }
			  .main-header[data-react-to-megamenu=true].megamenu-scheme-light .mainbar-wrap:not(.is-stuck) .ld-module-search-visible-form .ld-search-form input {
			    border-color: rgba(0, 0, 0, 0.2);
			    color: #000;
			  }
			  .main-header[data-react-to-megamenu=true].megamenu-scheme-light .mainbar-wrap:not(.is-stuck) .navbar-brand .logo-dark {
			    opacity: 1 !important;
			    visibility: visible !important;
			  }
			  .main-header[data-react-to-megamenu=true].megamenu-scheme-light .mainbar-wrap:not(.is-stuck) .navbar-brand .logo-light {
			    opacity: 0;
			    visibility: hidden;
			  }
			  .main-header[data-react-to-megamenu=true].megamenu-scheme-dark .mainbar-wrap:not(.is-stuck) .social-icon a {
			    color: rgba(255, 255, 255, 0.7) !important;
			  }
			  .main-header[data-react-to-megamenu=true].megamenu-scheme-dark .mainbar-wrap:not(.is-stuck) .social-icon a:hover {
			    color: #fff !important;
			  }
			  .main-header[data-react-to-megamenu=true].megamenu-scheme-dark .mainbar-wrap:not(.is-stuck) .header-module .ld-module-trigger,
			  .main-header[data-react-to-megamenu=true].megamenu-scheme-dark .mainbar-wrap:not(.is-stuck) .main-nav > li > a {
			    color: rgba(255, 255, 255, 0.7);
			  }
			  .main-header[data-react-to-megamenu=true].megamenu-scheme-dark .mainbar-wrap:not(.is-stuck) .header-module .ld-module-trigger:hover,
			  .main-header[data-react-to-megamenu=true].megamenu-scheme-dark .mainbar-wrap:not(.is-stuck) .main-nav > li > a:hover {
			    color: #fff;
			  }
			  .main-header[data-react-to-megamenu=true].megamenu-scheme-dark .mainbar-wrap:not(.is-stuck) .ld-module-search-visible-form .ld-search-form input {
			    border-color: rgba(255, 255, 255, 0.2);
			    color: #fff;
			  }
			  .main-header[data-react-to-megamenu=true].megamenu-scheme-dark .mainbar-wrap:not(.is-stuck) .ld-module-search-visible-form .input-icon {
			    color: rgba(255, 255, 255, 0.7);
			  }
			  .main-header[data-react-to-megamenu=true].megamenu-scheme-dark .mainbar-wrap:not(.is-stuck) .navbar-brand .logo-light {
			    opacity: 1 !important;
			    visibility: visible !important;
			  }
			  .main-header[data-react-to-megamenu=true].megamenu-scheme-dark .mainbar-wrap:not(.is-stuck) .navbar-brand .logo-dark {
			    opacity: 0;
			    visibility: hidden;
			  }
			  .mainbar-row > [class^=col] {
			    flex-flow: row nowrap;
			  }
			  .mainbar-row > [class^=col].text-right {
			    justify-content: flex-end;
			  }
			  .mainbar-row > [class^=col].text-center {
			    justify-content: center;
			  }
			  .mainbar-row > [class^=col].text-left {
			    justify-content: flex-start;
			  }
			  .secondarybar-row > [class^=col].text-right {
			    justify-content: flex-end;
			  }
			  .secondarybar-row > [class^=col].text-center {
			    justify-content: center;
			  }
			  .secondarybar-row > [class^=col].text-left {
			    justify-content: flex-start;
			  }
			  .is-stuck {
			    background-color: rgba(0, 0, 0, 0.75);
			    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.07);
			    -webkit-backdrop-filter: blur(20px) saturate(180%);
			            backdrop-filter: blur(20px) saturate(180%);
			  }
			  .is-stuck .ld-module-search-visible-form .ld-search-form input {
			    color: #fff;
			    border-color: rgba(255, 255, 255, 0.2);
			  }
			  .is-stuck .social-icon a,
			  .is-stuck .header-module .ld-module-trigger,
			  .is-stuck .main-nav > li > a {
			    color: rgba(255, 255, 255, 0.8) !important;
			  }
			  .is-stuck .social-icon a:hover,
			  .is-stuck .main-nav > li > a:hover,
			  .is-stuck .ld-module-search-visible-form .input-icon {
			    color: #fff !important;
			  }
			}
			
			@media screen and (max-width: {$max_media_mobile_nav}px) {
			  /*********************************************************
			-------------
			MOBULE HEADER
			-------------
			
			- Nav trigger alignment
			[data-mobile-nav-trigger-alignment]: [left, right]
			
			- Nav Style
			[data-mobile-nav-style]: [classic, minimal, modern]
			
			- Nav scheme
			[data-mobile-nav-scheme]: [gray, light, dark]
			
			- Nav alignment
			[data-mobile-nav-align]: [left, center]
			
			- Header Scheme
			[data-mobile-header-scheme]: [light, gray, dark]
			
			*********************************************************/
			  [data-mobile-nav-trigger-alignment=left] .navbar-header .navbar-toggle {
			    margin-left: 0;
			    order: -1;
			  }
			  [data-mobile-nav-trigger-alignment=left] .navbar-header .navbar-brand {
			    margin-left: auto;
			  }
			  [data-mobile-nav-trigger-alignment=right] .navbar-header .navbar-toggle {
			    margin-right: 0;
			    order: 1;
			  }
			  [data-mobile-nav-trigger-alignment=right] .navbar-header .navbar-brand {
			    margin-right: auto;
			  }
			  .main-header {
			    position: relative;
			    top: auto;
			    left: auto;
			  }
			  .main-header .header-module {
			    display: none;
			  }
			  .navbar-collapse .header-module {
			    display: flex;
			    margin-left: 0 !important;
			    align-items: flex-start;
			    padding-left: 15px;
			    padding-right: 15px;
			  }
			  .navbar-collapse .header-module:first-of-type {
			    margin-top: 20px;
			  }
			  .navbar-header .header-module {
			    display: inline-flex;
			    position: static;
			    margin-left: 20px;
			    order: 2;
			  }
			  .navbar-header .navbar-brand + .header-module {
			    margin-left: auto;
			  }
			  [data-mobile-nav-align=left] .navbar-collapse .header-module {
			    align-items: flex-start;
			    padding-left: 15px;
			    padding-right: 15px;
			  }
			  .nav-trigger {
			    display: flex;
			  }
			  .ld-module-dropdown {
			    top: 100%;
			  }
			  .ld-module-cart .ld-module-trigger-icon {
			    display: inline-block;
			    position: relative;
			  }
			  .ld-module-cart .ld-module-trigger-icon:before, .ld-module-cart .ld-module-trigger-icon:after {
			    content: '';
			    display: inline-block;
			    width: 1.5px;
			    height: 21px;
			    position: absolute;
			    top: 50%;
			    left: 0;
			    margin-top: -10px;
			    background-color: currentColor;
			    -webkit-transform-origin: bottom center;
			            transform-origin: bottom center;
			    transition: opacity 0.3s 0.05s, -webkit-transform 0.3s;
			    transition: transform 0.3s, opacity 0.3s 0.05s;
			    transition: transform 0.3s, opacity 0.3s 0.05s, -webkit-transform 0.3s;
			  }
			  .ld-module-cart .ld-module-trigger-icon:before {
			    -webkit-transform: rotate(45deg) translate(-4px, -2.5px);
			            transform: rotate(45deg) translate(-4px, -2.5px);
			  }
			  .ld-module-cart .ld-module-trigger-icon:after {
			    -webkit-transform: rotate(-45deg) translate(2px, -4px);
			            transform: rotate(-45deg) translate(2px, -4px);
			    left: auto;
			    right: 0;
			  }
			  .ld-module-cart .ld-module-trigger-icon i {
			    display: inline-block;
			    font-family: 'themethreads-icon' !important;
			    opacity: 0;
			    -webkit-transform: scale(0.85);
			            transform: scale(0.85);
			    transition: opacity 0.3s, -webkit-transform 0.3s;
			    transition: transform 0.3s, opacity 0.3s;
			    transition: transform 0.3s, opacity 0.3s, -webkit-transform 0.3s;
			  }
			  .ld-module-cart .ld-module-trigger-icon i:before {
			    content: '\e929';
			  }
			  .ld-module-cart .ld-module-trigger-count {
			    -webkit-transform: translateX(3px);
			            transform: translateX(3px);
			    opacity: 0;
			    transition: opacity 0.3s, -webkit-transform 0.3s;
			    transition: transform 0.3s, opacity 0.3s;
			    transition: transform 0.3s, opacity 0.3s, -webkit-transform 0.3s;
			  }
			  .ld-module-cart .ld-module-trigger.collapsed .ld-module-trigger-icon {
			    display: inline-block;
			    position: relative;
			  }
			  .ld-module-cart .ld-module-trigger.collapsed .ld-module-trigger-icon:before, .ld-module-cart .ld-module-trigger.collapsed .ld-module-trigger-icon:after {
			    opacity: 0;
			    -webkit-transform: rotate(0) scaleY(0.75);
			            transform: rotate(0) scaleY(0.75);
			  }
			  .ld-module-cart .ld-module-trigger.collapsed .ld-module-trigger-icon i {
			    opacity: 1;
			    -webkit-transform: scale(1);
			            transform: scale(1);
			  }
			  .ld-module-cart .ld-module-trigger.collapsed .ld-module-trigger-count {
			    -webkit-transform: translateX(0);
			            transform: translateX(0);
			    opacity: 1;
			  }
			  a.remove.ld-cart-product-remove {
			    width: 28px;
			    height: 28px;
			    margin-right: 8px;
			    position: relative;
			    top: auto;
			    left: auto;
			    opacity: 1;
			    visibility: visible;
			  }
			  .ld-module-search .ld-module-dropdown {
			    top: 0;
			    right: 0;
			  }
			  .ld-module-search .ld-module-dropdown.in, .ld-module-search .ld-module-dropdown[aria-expanded=true].collapsing {
			    height: 100% !important;
			  }
			  .ld-search-form-container {
			    height: 100%;
			    width: 100vw;
			    padding: 0 0;
			    border: none;
			  }
			  .ld-search-form {
			    height: 100%;
			  }
			  .ld-search-form input {
			    height: 100%;
			    border: none;
			    padding-left: 15px;
			    padding-right: 15px;
			    border-bottom: 2px solid #eaeaea;
			    border-radius: 0;
			    color: inherit;
			    background: none;
			  }
			  .ld-search-form .input-icon {
			    display: inline-flex;
			    width: 50px;
			    height: 50px;
			    right: 0;
			    left: auto;
			    color: #000;
			    font-size: 36px;
			    cursor: pointer;
			    align-items: center;
			    justify-content: center;
			    border-radius: 3px;
			  }
			  .ld-search-form .input-icon:hover {
			    background-color: rgba(0, 0, 0, 0.1);
			  }
			  .ld-search-form .input-icon i:before {
			    content: '\e94a';
			  }
			  .main-header .navbar-brand {
			    padding: 22px 0;
			  }
			  .main-header .mobile-logo-default ~ .logo-default {
			    display: none;
			  }
			  .main-header .main-nav {
			    font-size: 14px;
			    font-weight: 500;
			    line-height: 1.5em;
			    text-transform: none;
			    letter-spacing: 0;
			    text-align: left;
			  }
			  .main-header .main-nav > li > a {
			    font-size: inherit;
			    font-weight: inherit;
			    line-height: inherit;
			    text-transform: inherit;
			    letter-spacing: inherit;
			  }
			  .navbar-header {
			    padding-left: 25px;
			    padding-right: 25px;
			  }
			  .navbar-collapse {
			    overflow-x: hidden;
			    overflow-y: auto;
			    color: #000;
			  }
			  .navbar-collapse .social-icon li a {
			    color: inherit;
			    opacity: 0.7;
			  }
			  .navbar-collapse .social-icon li a:hover {
			    opacity: 1;
			  }
			  .navbar-collapse .btn-naked,
			  .navbar-collapse .btn-underlined {
			    color: inherit;
			    border-color: currentColor;
			  }
			  .navbar-collapse .btn-naked:before, .navbar-collapse .btn-naked:after,
			  .navbar-collapse .btn-underlined:before,
			  .navbar-collapse .btn-underlined:after {
			    background-color: currentColor;
			  }
			  .navbar-collapse .btn-naked:before,
			  .navbar-collapse .btn-underlined:before {
			    opacity: 0.5;
			  }
			  .navbar-collapse .btn-naked .btn-txt,
			  .navbar-collapse .btn-underlined .btn-txt {
			    opacity: 0.7;
			    transition: opacity 0.3s;
			  }
			  .navbar-collapse .btn-naked:hover,
			  .navbar-collapse .btn-underlined:hover {
			    color: inherit;
			  }
			  .navbar-collapse .btn-naked:hover .btn-txt,
			  .navbar-collapse .btn-underlined:hover .btn-txt {
			    opacity: 1;
			  }
			  ul.nav.main-nav > li {
			    padding-left: 0;
			    padding-right: 0;
			  }
			  ul.nav.main-nav > li > a {
			    display: flex;
			    padding: 15px;
			    border-bottom: 1px solid rgba(0, 0, 0, 0.05);
			    align-items: center;
			    color: #000;
			  }
			  ul.nav.main-nav > li > a:hover {
			    color: #000;
			  }
			  ul.nav.main-nav + .header-module {
			    margin-top: 15px;
			  }
			  .mainbar-row > .navbar-header {
			    margin-left: 15px;
			    margin-right: 15px;
			  }
			  [data-mobile-nav-align=center] .navbar-collapse {
			    text-align: center;
			  }
			  [data-mobile-nav-align=center] ul.nav.main-nav > li > a {
			    justify-content: center;
			  }
			  [data-mobile-nav-style=classic] .navbar-collapse,
			  [data-mobile-nav-style=minimal] .navbar-collapse {
			    max-height: 82.5vh;
			    box-shadow: 0 10px 50px rgba(0, 0, 0, 0.05);
			    background-color: #fff;
			  }
			  [data-mobile-nav-style=modern] ul.nav.main-nav,
			  [data-mobile-nav-style=minimal] ul.nav.main-nav {
			    padding-top: 12px;
			    padding-bottom: 12px;
			    font-size: 16px;
			  }
			  [data-mobile-nav-style=modern] ul.nav.main-nav > li > a,
			  [data-mobile-nav-style=minimal] ul.nav.main-nav > li > a {
			    border: none;
			  }
			  [data-mobile-nav-style=modern]:before {
			    content: '';
			    display: inline-block;
			    width: 100vw;
			    height: 100vh;
			    position: fixed;
			    top: 0;
			    left: 0;
			    z-index: -1;
			    opacity: 0;
			    -webkit-transform: scale(1.75);
			            transform: scale(1.75);
			    background-image: linear-gradient(to top left, #1DE1BC 0%, #DA0BEE 100%);
			    transition: opacity 0.3s, -webkit-transform 0.3s;
			    transition: opacity 0.3s, transform 0.3s;
			    transition: opacity 0.3s, transform 0.3s, -webkit-transform 0.3s;
			    transition-delay: 0.05s;
			  }
			  [data-mobile-nav-style=modern] #wrap {
			    transition: height 0.3s, -webkit-transform 0.55s cubic-bezier(0.23, 1, 0.32, 1);
			    transition: transform 0.55s cubic-bezier(0.23, 1, 0.32, 1), height 0.3s;
			    transition: transform 0.55s cubic-bezier(0.23, 1, 0.32, 1), height 0.3s, -webkit-transform 0.55s cubic-bezier(0.23, 1, 0.32, 1);
			  }
			  [data-mobile-nav-style=modern] .navbar-toggle {
			    pointer-events: none;
			  }
			  [data-mobile-nav-style=modern] .navbar-toggle.mobile-nav-trigger-cloned {
			    pointer-events: all;
			  }
			  [data-mobile-nav-style=modern] .navbar-collapse-clone {
			    display: flex !important;
			    width: 70vw;
			    height: 80vh !important;
			    padding-top: 20px;
			    border: none;
			    position: fixed;
			    top: 12vh;
			    right: 0;
			    z-index: 90;
			    background: none !important;
			    box-shadow: none;
			    flex-direction: column;
			    justify-content: center;
			    -webkit-transform: translate3d(25vw, 0, 0);
			            transform: translate3d(25vw, 0, 0);
			    opacity: 0;
			    visibility: hidden;
			    overflow: visible !important;
			    transition-property: opacity, visibility, -webkit-transform;
			    transition-property: transform, opacity, visibility;
			    transition-property: transform, opacity, visibility, -webkit-transform;
			    transition-duration: 0.45s;
			    transition-timing-function: cubic-bezier(0.23, 1, 0.32, 1);
			  }
			  [data-mobile-nav-style=modern] .navbar-collapse-clone .nav-trigger {
			    position: absolute;
			    top: -20px;
			    right: 0;
			    z-index: 10;
			    justify-content: flex-end;
			    color: #fff;
			    pointer-events: all;
			    -webkit-transform: none !important;
			            transform: none !important;
			    transition: none !important;
			  }
			  [data-mobile-nav-style=modern] .navbar-collapse-clone .nav-trigger .bars {
			    justify-content: center;
			    padding-left: 8px;
			    width: 42px;
			    height: 42px;
			    border: 2.4px solid rgba(255, 255, 255, 0.4);
			    border-radius: 50em;
			    -webkit-transform: none !important;
			            transform: none !important;
			    transition: none !important;
			  }
			  [data-mobile-nav-style=modern] .navbar-collapse-clone .nav-trigger .bar {
			    background-color: #fff;
			  }
			  [data-mobile-nav-style=modern] .navbar-collapse-clone .nav-trigger .bar:first-child, [data-mobile-nav-style=modern] .navbar-collapse-clone .nav-trigger .bar:last-child {
			    display: none;
			  }
			  [data-mobile-nav-style=modern] .navbar-collapse-clone .nav-trigger .bar:nth-child(2) {
			    -webkit-transform: translateY(2px) rotate(135deg) !important;
			            transform: translateY(2px) rotate(135deg) !important;
			    transition: none !important;
			  }
			  [data-mobile-nav-style=modern] .navbar-collapse-clone ul,
			  [data-mobile-nav-style=modern] .navbar-collapse-clone ul.nav.main-nav {
			    flex: 0 auto;
			  }
			  [data-mobile-nav-style=modern] .navbar-collapse-clone ul .nav-item-children > li > a,
			  [data-mobile-nav-style=modern] .navbar-collapse-clone ul > li > a,
			  [data-mobile-nav-style=modern] .navbar-collapse-clone ul.nav.main-nav .nav-item-children > li > a,
			  [data-mobile-nav-style=modern] .navbar-collapse-clone ul.nav.main-nav > li > a {
			    color: #fff;
			  }
			  [data-mobile-nav-style=modern] .navbar-collapse-clone ul .nav-item-children > li > a:hover,
			  [data-mobile-nav-style=modern] .navbar-collapse-clone ul > li > a:hover,
			  [data-mobile-nav-style=modern] .navbar-collapse-clone ul.nav.main-nav .nav-item-children > li > a:hover,
			  [data-mobile-nav-style=modern] .navbar-collapse-clone ul.nav.main-nav > li > a:hover {
			    color: #fff;
			  }
			  [data-mobile-nav-style=modern] .navbar-collapse-inner {
			    display: block;
			    position: relative;
			    overflow-x: hidden;
			    overflow-y: auto;
			  }
			  [data-mobile-nav-style=modern] .megamenu .megamenu-container {
			    padding: 0 35px;
			  }
			  [data-mobile-nav-style=modern] .megamenu .vc_row,
			  [data-mobile-nav-style=modern] .megamenu .ld-row,
			  [data-mobile-nav-style=modern] .megamenu .ld-container,
			  [data-mobile-nav-style=modern] .megamenu .megamenu-column,
			  [data-mobile-nav-style=modern] .megamenu .vc_column-inner {
			    width: 100%;
			    border: none !important;
			    background: none !important;
			    padding: 0 !important;
			    margin: 0 !important;
			  }
			  [data-mobile-nav-style=modern] .megamenu .ld-fancy-heading > * {
			    color: #fff;
			  }
			  .mobile-nav-activated [data-mobile-nav-style=modern]:before {
			    -webkit-transform: scale(1);
			            transform: scale(1);
			    opacity: 1;
			    transition-delay: 0s;
			  }
			  .mobile-nav-activated [data-mobile-nav-style=modern] #wrap {
			    overflow: hidden;
			    background-color: #fff;
			    -webkit-transform: translate3d(-80vw, 0, 0);
			            transform: translate3d(-80vw, 0, 0);
			  }
			  .mobile-nav-activated [data-mobile-nav-style=modern] .navbar-collapse-clone {
			    -webkit-transform: translate3d(0, 0, 0);
			            transform: translate3d(0, 0, 0);
			    opacity: 1;
			    visibility: visible !important;
			    transition-delay: 0.1s;
			  }
			  .module-expanding,
			  .module-collapsing {
			    overflow: hidden;
			  }
			  .module-expanding [data-mobile-nav-style=modern] #wrap,
			  .module-collapsing [data-mobile-nav-style=modern] #wrap {
			    transition-property: height, -webkit-transform;
			    transition-property: transform, height;
			    transition-property: transform, height, -webkit-transform;
			    transition-duration: 0.45s;
			    transition-timing-function: cubic-bezier(0.23, 1, 0.32, 1);
			    background-color: #fff;
			    overflow: hidden;
			  }
			  .module-collapsing [data-mobile-nav-style=modern] #wrap {
			    overflow: hidden;
			  }
			  [data-mobile-nav-scheme=gray] .navbar-collapse {
			    background-color: #f9f9f9;
			    color: #000;
			  }
			  [data-mobile-nav-scheme=gray] ul.nav.main-nav > li > a {
			    color: #000;
			  }
			  [data-mobile-nav-scheme=gray] ul.nav.main-nav > li:hover {
			    color: #000;
			  }
			  [data-mobile-nav-scheme=dark] .navbar-collapse {
			    background-color: #191D18;
			    color: #fff;
			  }
			  [data-mobile-nav-scheme=dark] ul.nav.main-nav > li > a {
			    border-color: rgba(255, 255, 255, 0.1);
			    color: #fff;
			  }
			  [data-mobile-nav-scheme=dark] ul.nav.main-nav > li > a:hover {
			    color: #fff;
			  }
			  [data-mobile-nav-scheme=dark] .submenu-expander:hover {
			    background-color: rgba(255, 255, 255, 0.05);
			  }
			  [data-mobile-header-scheme=light] .navbar-header {
			    background-color: #fff;
			  }
			  [data-mobile-header-scheme=gray] .main-header .navbar-header {
			    background-color: #f6f6f6;
			  }
			  [data-mobile-header-scheme=dark] .navbar-header {
			    background-color: #191D18;
			  }
			  [data-mobile-header-scheme=dark] .nav-trigger .bar {
			    background-color: #fff;
			  }
			  [data-mobile-header-scheme=dark] .ld-module-trigger {
			    color: #fff;
			  }
			  [data-mobile-header-scheme=dark] .ld-search-form-container {
			    background-color: #191D18;
			  }
			  [data-mobile-header-scheme=dark] .ld-search-form input {
			    border-color: rgba(255, 255, 255, 0.45);
			    color: #fff;
			  }
			  [data-mobile-header-scheme=dark] .ld-search-form .input-icon {
			    color: #fff;
			  }
			  [data-mobile-header-scheme=dark] .ld-search-form .input-icon:hover {
			    background-color: rgba(255, 255, 255, 0.1);
			  }
			  .main-nav .children,
			  .nav-item-children {
			    display: none;
			    min-width: 0;
			    padding: 15px 0;
			    border-radius: 0;
			    position: static;
			    top: auto;
			    left: auto;
			    right: auto;
			    visibility: visible;
			    text-align: inherit;
			    box-shadow: none;
			    font-size: inherit;
			    font-weight: inherit;
			    line-height: inherit;
			    text-transform: inherit;
			    letter-spacing: inherit;
			  }
			  .main-nav .children > li > a,
			  .nav-item-children > li > a {
			    padding: 8px 35px;
			    color: inherit;
			  }
			  .main-nav .children > li:hover > a,
			  .nav-item-children > li:hover > a {
			    background: none;
			  }
			  .main-nav .children .nav-item-children,
			  .nav-item-children .nav-item-children {
			    padding: 8px 0 8px 15px;
			  }
			  [data-mobile-nav-scheme=dark] .nav-item-children {
			    background-color: #1b201a;
			  }
			  [data-mobile-nav-scheme=dark] .nav-item-children > li > a {
			    opacity: 0.75;
			  }
			  [data-mobile-nav-scheme=dark] .nav-item-children > li:hover > a,
			  [data-mobile-nav-scheme=dark] .nav-item-children > li.active > a,
			  [data-mobile-nav-scheme=dark] .nav-item-children > li.current-menu-item > a {
			    color: inherit;
			    opacity: 1;
			  }
			  [data-mobile-nav-align=center] .nav-item-children {
			    text-align: center;
			  }
			  [data-mobile-nav-align=center] .nav-item-children .nav-item-children {
			    padding-left: 15px;
			    padding-right: 15px;
			  }
			  [data-mobile-nav-style=minimal] .nav-item-children {
			    font-size: 14px;
			  }
			  [data-mobile-nav-style=modern] .main-nav .children,
			  [data-mobile-nav-style=modern] .nav-item-children {
			    background: transparent;
			  }
			  .megamenu .nav-item-children {
			    left: auto !important;
			  }
			  .megamenu .megamenu-container {
			    padding-top: 15px;
			    padding-bottom: 15px;
			  }
			  .megamenu .megamenu-column {
			    padding-left: 15px;
			    padding-right: 15px;
			  }
			  .megamenu .ld-container,
			  .megamenu .vc_column-inner {
			    padding-left: 15px !important;
			    padding-right: 15px !important;
			  }
			  .megamenu .ld-row {
			    display: block;
			    margin-left: -15px !important;
			    margin-right: -15px !important;
			  }
			  .megamenu .vc_row,
			  .megamenu .wpb_wrapper {
			    background: none !important;
			    padding: 0 !important;
			    margin: 0 !important;
			  }
			  .megamenu .vc_row {
			    border: none !important;
			  }
			  .megamenu .wpb_single_image.invisible {
			    visibility: visible;
			  }
			  .megamenu-container {
			    width: auto !important;
			  }
			  .main-header .mainbar-wrap {
			    padding: 0 !important;
			    margin: 0 !important;
			  }
			  .main-header .mainbar-wrap .mainbar-container {
			    width: 100%;
			    padding-left: 0 !important;
			    padding-right: 0 !important;
			  }
			  .main-header .mainbar-row {
			    flex-direction: column;
			    padding-left: 0 !important;
			    padding-right: 0 !important;
			    margin-left: -15px !important;
			    margin-right: -15px !important;
			  }
			  .main-header .mainbar-row > [class^=col] {
			    flex: 1 auto;
			    flex-direction: column;
			    padding-left: 15px !important;
			    padding-right: 15px !important;
			    margin-left: 0 !important;
			    margin-right: 0 !important;
			    min-height: 0;
			  }
			  .main-header .mainbar-row > [class^=col] > .main-nav {
			    display: none;
			  }
			  .secondarybar-wrap {
			    display: none;
				}
				[data-mobile-secondary-bar=true] .secondarybar-wrap {
					display: block;
				}
				[data-mobile-secondary-bar=true] .secondarybar-wrap .header-module {
					display: inline-flex;
				}
		}";

	//Return the arrary with styles to output
	return $css;

}