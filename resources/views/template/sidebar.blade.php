<?php

$sidebar = [
    [
        'group' => 'dashboard',
        'title' => 'Dashboard',
        'icon'  => 'tachometer-alt',
        'url'   => url('dashboard'),
        'role'  => [
            1,
            2
        ]
    ],
    [
        'group' => 'banner',
        'title' => 'Banner',
        'icon'  => 'image',
        'url'   => url('master-banner'),
        'role'  => [
            1,
            2
        ]
    ],
    [
        'group' => 'news',
        'title' => 'News & Event',
        'icon'  => 'newspaper',
        'url'   => url('master-news'),
        'role'  => [
            1,
            2
        ]
    ],
    [
        'group' => 'brand',
        'title' => 'Brand',
        'icon'  => 'list',
        'url'   => url('master-brand'),
        'role'  => [
            1,
            2
        ]
    ],
    [
        'group' => 'animal',
        'title' => 'Animals',
        'icon'  => 'paw',
        'url'   => url('master-animal'),
        'role'  => [
            2
        ]
    ],
    [
        'group' => 'animal',
        'title' => 'Food Type',
        'icon'  => 'carrot',
        'url'   => url('master-food'),
        'role'  => [
            2
        ]
    ],
    [
        'group' => 'consultation',
        'title' => 'Contact Form',
        'icon'  => 'edit',
        'url'   => url('master-consultation'),
        'role'  => [
            1,
            2
        ]
    ],
    [
        'group' => 'product',
        'title' => 'Products',
        'icon'  => 'list',
        'url'   => url('master-product'),
        'role'  => [
            1,
            2
        ]
    ],
    [
        'group' => 'review',
        'title' => 'Testimonials',
        'icon'  => 'medal',
        'url'   => url('master-review'),
        'role'  => [
            1,
            2
        ]
    ],
];
$admin = session()->get('admin');
$menu['id_role'] = $admin['id_role'];
?>

<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">PERFECT COMPANION <sup>INDONESIA</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    @foreach ($sidebar as $keyGroup => $valueGroup)
    @if (in_array($menu['id_role'], $valueGroup['role']))
    @if (isset($valueGroup['title']) && !isset($valueGroup['list']))
    <li class="nav-item active">
        <a class="nav-link" href="{{ $valueGroup['url'] }}">
            <i class="fas fa-fw fa-{{ $valueGroup['icon'] }}"></i>
            <span>{{ $valueGroup['title'] }}</span>
        </a>
    </li>
    @endif
    @endif
    @if (isset($valueGroup['list']))
    <li class="nav-item active">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>{{ $valueGroup['title'] }}</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                @foreach ($valueGroup['list'] as $key => $value)
                @if (in_array($menu['id_role'], $value['role']))
                <a class="collapse-item" href="">{{ $value['title'] }}</a>
                @endif
                @endforeach
            </div>
        </div>
    </li>
    @endif
    @endforeach
    <!-- Divider -->
    <hr class=" sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>