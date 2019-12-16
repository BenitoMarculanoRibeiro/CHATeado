/**
 * AdminLTE Demo Menu
 * ------------------
 * You should not use this file in production.
 * This file is for demo purposes only.
 */
(function($) {
    'use strict'

    var $sidebar = $('.control-sidebar')
    var $container = $('<div />', {
        class: 'p-3 control-sidebar-content'
    })

    $sidebar.append($container)

    var navbar_dark_skins = [
        'navbar-primary',
        'navbar-secondary',
        'navbar-info',
        'navbar-success',
        'navbar-danger',
        'navbar-indigo',
        'navbar-purple',
        'navbar-pink',
        'navbar-teal',
        'navbar-cyan',
        'navbar-dark',
        'navbar-gray-dark',
        'navbar-gray',
    ]

    var navbar_light_skins = [
        'navbar-light',
        'navbar-warning',
        'navbar-white',
        'navbar-orange',
    ]

    $container.append(
        '<h5>Customize AdminLTE</h5><hr class="mb-2"/>' +
        '<h6>Navbar Variants</h6>'
    )

    var $navbar_variants = $('<div />', {
        'class': 'd-flex'
    })
    var navbar_all_colors = navbar_dark_skins.concat(navbar_light_skins)
    var $navbar_variants_colors = createSkinBlock(navbar_all_colors, function(e) {
        var color = $(this).data('color')
        var $main_header = $('.main-header')
        $main_header.removeClass('navbar-dark').removeClass('navbar-light')
        navbar_all_colors.map(function(color) {
            $main_header.removeClass(color)
        })

        if (navbar_dark_skins.indexOf(color) > -1) {
            $main_header.addClass('navbar-dark')
        } else {
            $main_header.addClass('navbar-light')
        }

        $main_header.addClass(color)
    })

    $navbar_variants.append($navbar_variants_colors)

    $container.append($navbar_variants)

    var $checkbox_container = $('<div />', {
        'class': 'mb-4'
    })
    var $navbar_border = $('<input />', {
        type: 'checkbox',
        value: 1,
        checked: $('.main-header').hasClass('border-bottom-0'),
        'class': 'mr-1'
    }).on('click', function() {
        if ($(this).is(':checked')) {
            $('.main-header').addClass('border-bottom-0')
        } else {
            $('.main-header').removeClass('border-bottom-0')
        }
    })
    $checkbox_container.append($navbar_border)
    $checkbox_container.append('<span>No Navbar border</span>')
    $container.append($checkbox_container)


    var sidebar_colors = [
        'bg-primary',
        'bg-warning',
        'bg-info',
        'bg-danger',
        'bg-success',
        'bg-indigo',
        'bg-navy',
        'bg-purple',
        'bg-fuchsia',
        'bg-pink',
        'bg-maroon',
        'bg-orange',
        'bg-lime',
        'bg-teal',
        'bg-olive'
    ]

    var sidebar_skins = [
        'sidebar-dark-primary',
        'sidebar-dark-warning',
        'sidebar-dark-info',
        'sidebar-dark-danger',
        'sidebar-dark-success',
        'sidebar-dark-indigo',
        'sidebar-dark-navy',
        'sidebar-dark-purple',
        'sidebar-dark-fuchsia',
        'sidebar-dark-pink',
        'sidebar-dark-maroon',
        'sidebar-dark-orange',
        'sidebar-dark-lime',
        'sidebar-dark-teal',
        'sidebar-dark-olive',
        'sidebar-light-primary',
        'sidebar-light-warning',
        'sidebar-light-info',
        'sidebar-light-danger',
        'sidebar-light-success',
        'sidebar-light-indigo',
        'sidebar-light-navy',
        'sidebar-light-purple',
        'sidebar-light-fuchsia',
        'sidebar-light-pink',
        'sidebar-light-maroon',
        'sidebar-light-orange',
        'sidebar-light-lime',
        'sidebar-light-teal',
        'sidebar-light-olive'
    ]

    $container.append('<h6>Dark Sidebar Variants</h6>')
    var $sidebar_variants = $('<div />', {
        'class': 'd-flex'
    })
    $container.append($sidebar_variants)
    $container.append(createSkinBlock(sidebar_colors, function() {
        var color = $(this).data('color')
        var sidebar_class = 'sidebar-dark-' + color.replace('bg-', '')
        var $sidebar = $('.main-sidebar')
        sidebar_skins.map(function(skin) {
            $sidebar.removeClass(skin)
        })

        $sidebar.addClass(sidebar_class)
    }))

    $container.append('<h6>Light Sidebar Variants</h6>')
    var $sidebar_variants = $('<div />', {
        'class': 'd-flex'
    })
    $container.append($sidebar_variants)
    $container.append(createSkinBlock(sidebar_colors, function() {
        var color = $(this).data('color')
        var sidebar_class = 'sidebar-light-' + color.replace('bg-', '')
        var $sidebar = $('.main-sidebar')
        sidebar_skins.map(function(skin) {
            $sidebar.removeClass(skin)
        })

        $sidebar.addClass(sidebar_class)
    }))

    var logo_skins = navbar_all_colors
    $container.append('<h6>Brand Logo Variants</h6>')
    var $logo_variants = $('<div />', {
        'class': 'd-flex'
    })
    $container.append($logo_variants)
    var $clear_btn = $('<a />', {
        href: 'javascript:void(0)'
    }).text('clear').on('click', function() {
        var $logo = $('.brand-link')
        logo_skins.map(function(skin) {
            $logo.removeClass(skin)
        })
    })
    $container.append(createSkinBlock(logo_skins, function() {
        var color = $(this).data('color')
        var $logo = $('.brand-link')
        logo_skins.map(function(skin) {
            $logo.removeClass(skin)
        })
        $logo.addClass(color)
    }).append($clear_btn))

    function createSkinBlock(colors, callback) {
        var $block = $('<div />', {
            'class': 'd-flex flex-wrap mb-3'
        })

        colors.map(function(color) {
            var $color = $('<div />', {
                'class': (typeof color === 'object' ? color.join(' ') : color) + ' elevation-2'
            })

            $block.append($color)

            $color.data('color', color)

            $color.css({
                width: '40px',
                height: '20px',
                borderRadius: '25px',
                marginRight: 10,
                marginBottom: 10,
                opacity: 0.8,
                cursor: 'pointer'
            })

            $color.hover(function() {
                $(this).css({ opacity: 1 }).removeClass('elevation-2').addClass('elevation-4')
            }, function() {
                $(this).css({ opacity: 0.8 }).removeClass('elevation-4').addClass('elevation-2')
            })

            if (callback) {
                $color.on('click', callback)
            }
        })

        return $block
    }
})(jQuery)