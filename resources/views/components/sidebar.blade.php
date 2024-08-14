<nav class="md:left-0 md:block md:fixed md:top-0 md:bottom-0 md:overflow-y-auto md:flex-row md:flex-nowrap md:overflow-hidden shadow-xl bg-white flex flex-wrap items-center justify-between relative md:w-64 z-10 py-4 px-6">
    <div class="md:flex-col md:items-stretch md:min-h-full md:flex-nowrap px-0 flex flex-wrap items-center justify-between w-full mx-auto">
        <button class="cursor-pointer text-black opacity-50 md:hidden px-3 py-1 text-xl leading-none bg-transparent rounded border border-solid border-transparent" type="button" onclick="toggleNavbar('example-collapse-sidebar')">
            <i class="fas fa-bars"></i>
        </button>
        <a class="md:block text-left md:pb-2 text-blueGray-700 mr-0 inline-block whitespace-nowrap text-sm uppercase font-bold p-4 px-0" href="{{ route('admin.home') }}">
            {{ trans('panel.site_title') }}
        </a>
        <div class="md:flex md:flex-col md:items-stretch md:opacity-100 md:relative md:mt-4 md:shadow-none shadow absolute top-0 left-0 right-0 z-40 overflow-y-auto overflow-x-hidden h-auto items-center flex-1 rounded hidden" id="example-collapse-sidebar">
            <div class="md:min-w-full md:hidden block pb-4 mb-4 border-b border-solid border-blueGray-300">
                <div class="flex flex-wrap">
                    <div class="w-6/12">
                        <a class="md:block text-left md:pb-2 text-blueGray-700 mr-0 inline-block whitespace-nowrap text-sm uppercase font-bold p-4 px-0" href="{{ route('admin.home') }}">
                            {{ trans('panel.site_title') }}
                        </a>
                    </div>
                    <div class="w-6/12 flex justify-end">
                        <button type="button" class="cursor-pointer text-black opacity-50 md:hidden px-3 py-1 text-xl leading-none bg-transparent rounded border border-solid border-transparent" onclick="toggleNavbar('example-collapse-sidebar')">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
            </div>



            <!-- Divider -->
            <div class="flex md:hidden">
                @if(file_exists(app_path('Http/Livewire/LanguageSwitcher.php')))
                    <livewire:language-switcher />
                @endif
            </div>
            <hr class="mb-6 md:min-w-full" />
            <!-- Heading -->

            <ul class="md:flex-col md:min-w-full flex flex-col list-none">
                <li class="items-center">
                    <a href="{{ route("admin.home") }}" class="{{ request()->is("admin") ? "sidebar-nav-active" : "sidebar-nav" }}">
                        <i class="fas fa-tv"></i>
                        {{ trans('global.dashboard') }}
                    </a>
                </li>

                @can('card_access')
                    <li class="items-center">
                        <a class="{{ request()->is("admin/cards*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.cards.index") }}">
                            <i class="fa-fw c-sidebar-nav-icon far fa-address-card">
                            </i>
                            {{ trans('cruds.card.title') }}
                        </a>
                    </li>
                @endcan
                @can('inquiry_access')
                    <li class="items-center">
                        <a class="{{ request()->is("admin/inquiries*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.inquiries.index") }}">
                            <i class="fa-fw c-sidebar-nav-icon far fa-file-alt">
                            </i>
                            {{ trans('cruds.inquiry.title') }}
                        </a>
                    </li>
                @endcan
                @can('identity_verification_access')
                    <li class="items-center">
                        <a class="{{ request()->is("admin/identity-verifications*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.identity-verifications.index") }}">
                            <i class="fa-fw c-sidebar-nav-icon fab fa-500px">
                            </i>
                            {{ trans('cruds.identityVerification.title') }}
                        </a>
                    </li>
                @endcan
                @can('payment_access')
                    <li class="items-center">
                        <a class="{{ request()->is("admin/payments*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.payments.index") }}">
                            <i class="fa-fw c-sidebar-nav-icon far fa-credit-card">
                            </i>
                            {{ trans('cruds.payment.title') }}
                        </a>
                    </li>
                @endcan
                @can('membership_access')
                    <li class="items-center">
                        <a class="has-sub {{ request()->is("admin/card-types*")||request()->is("admin/membership-types*")||request()->is("admin/membership-packages*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="#" onclick="window.openSubNav(this)">
                            <i class="fa-fw fas c-sidebar-nav-icon fa-id-card-alt">
                            </i>
                            {{ trans('cruds.membership.title') }}
                        </a>
                        <ul class="ml-4 subnav hidden">
                            @can('card_type_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/card-types*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.card-types.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-list-ul">
                                        </i>
                                        {{ trans('cruds.cardType.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('membership_type_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/membership-types*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.membership-types.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon far fa-address-book">
                                        </i>
                                        {{ trans('cruds.membershipType.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('membership_package_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/membership-packages*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.membership-packages.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-cubes">
                                        </i>
                                        {{ trans('cruds.membershipPackage.title') }}
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('association_access')
                    <li class="items-center">
                        <a class="has-sub {{ request()->is("admin/association-lists*")||request()->is("admin/association-types*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="#" onclick="window.openSubNav(this)">
                            <i class="fa-fw fas c-sidebar-nav-icon far fa-building">
                            </i>
                            {{ trans('cruds.association.title') }}
                        </a>
                        <ul class="ml-4 subnav hidden">
                            @can('association_list_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/association-lists*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.association-lists.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-list-ol">
                                        </i>
                                        {{ trans('cruds.associationList.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('association_type_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/association-types*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.association-types.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon far fa-list-alt">
                                        </i>
                                        {{ trans('cruds.associationType.title') }}
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('local_access')
                    <li class="items-center">
                        <a class="has-sub {{ request()->is("admin/regions*")||request()->is("admin/cities*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="#" onclick="window.openSubNav(this)">
                            <i class="fa-fw fas c-sidebar-nav-icon far fa-compass">
                            </i>
                            {{ trans('cruds.local.title') }}
                        </a>
                        <ul class="ml-4 subnav hidden">
                            @can('region_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/regions*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.regions.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon far fa-map">
                                        </i>
                                        {{ trans('cruds.region.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('city_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/cities*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.cities.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-map-marked">
                                        </i>
                                        {{ trans('cruds.city.title') }}
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('user_management_access')
                    <li class="items-center">
                        <a class="has-sub {{ request()->is("admin/users*")||request()->is("admin/roles*")||request()->is("admin/permissions*")||request()->is("admin/user-alerts*")||request()->is("admin/audit-logs*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="#" onclick="window.openSubNav(this)">
                            <i class="fa-fw fas c-sidebar-nav-icon fa-users">
                            </i>
                            {{ trans('cruds.userManagement.title') }}
                        </a>
                        <ul class="ml-4 subnav hidden">
                            @can('user_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/users*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.users.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-user">
                                        </i>
                                        {{ trans('cruds.user.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('role_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/roles*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.roles.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-briefcase">
                                        </i>
                                        {{ trans('cruds.role.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('permission_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/permissions*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.permissions.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-unlock-alt">
                                        </i>
                                        {{ trans('cruds.permission.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('user_alert_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/user-alerts*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.user-alerts.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-bell">
                                        </i>
                                        {{ trans('cruds.userAlert.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('audit_log_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/audit-logs*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.audit-logs.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-file-alt">
                                        </i>
                                        {{ trans('cruds.auditLog.title') }}
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan

                @if(file_exists(app_path('Http/Controllers/Auth/UserProfileController.php')))
                    @can('auth_profile_edit')
                        <li class="items-center">
                            <a href="{{ route("profile.show") }}" class="{{ request()->is("profile") ? "sidebar-nav-active" : "sidebar-nav" }}">
                                <i class="fa-fw c-sidebar-nav-icon fas fa-user-circle"></i>
                                {{ trans('global.my_profile') }}
                            </a>
                        </li>
                    @endcan
                @endif

                <li class="items-center">
                    <a href="#" onclick="event.preventDefault(); document.getElementById('logoutform').submit();" class="sidebar-nav">
                        <i class="fa-fw fas fa-sign-out-alt"></i>
                        {{ trans('global.logout') }}
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>