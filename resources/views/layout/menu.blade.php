<!-- BEGIN: Left Aside -->
<div id="m_aside_left" class="m-grid__item	m-aside-left  m-aside-left--skin-dark ">
    <!-- BEGIN: Aside Menu -->
    <div
        id="m_ver_menu"
        class="m-aside-menu  m-aside-menu--skin-dark m-aside-menu--submenu-skin-dark "
        data-menu-vertical="true"
        data-menu-scrollable="false" data-menu-dropdown-timeout="500"
    >
        <ul class="m-menu__nav  m-menu__nav--dropdown-submenu-arrow ">
            @if(Session::has('full_name'))
                @if(session()->get('permission.1.use') == true)
                    <li class="m-menu__item  m-menu__item--active" aria-haspopup="true">
                        <a href="?page=index&amp;demo=default" class="m-menu__link ">
                            <i class="m-menu__link-icon flaticon-line-graph"></i>
                            <span class="m-menu__link-title">
                        <span class="m-menu__link-wrap">
                            <span class="m-menu__link-text">{{ trans('main.dashboard') }}</span>
                            {{--<span class="m-menu__link-badge">--}}
                                {{--<span class="m-badge m-badge--danger">2</span>--}}
                            {{--</span>--}}
                        </span>
                    </span>
                        </a>
                    </li>
                @else
                    <li class="m-menu__item  m-menu__item--active" aria-haspopup="true">
                        <a href="?page=index&amp;demo=default" class="m-menu__link ">
                            <i class="m-menu__link-icon flaticon-line-graph"></i>
                            <span class="m-menu__link-title">
                        <span class="m-menu__link-wrap">
                            <span class="m-menu__link-text">{{ trans('main.dashboard') }}</span>
                        </span>
                    </span>
                        </a>
                    </li>
                @endif

                @php($required = [2,4,5,7,8,9,10,11,12])
                @if(count(array_intersect_key(array_flip($required), session()->get('permission'))) === count($required))
                    <li class="m-menu__section ">
                        <h4 class="m-menu__section-text">Components</h4>
                        <i class="m-menu__section-icon flaticon-more-v3"></i>
                    </li>

                    @php($required = [2])
                    @if(count(array_intersect_key(array_flip($required), session()->get('permission'))) === count($required))
                        <li class="m-menu__item " aria-haspopup="true">
                            <a href="?page=builder&amp;demo=default" class="m-menu__link ">
                                <i class="m-menu__link-icon flaticon-interface-6"></i>
                                <span class="m-menu__link-text">{{ trans('main.job_list') }}</span>
                            </a>
                        </li>
                    @endif

                    @php($required = [4,5])
                    @if(count(array_intersect_key(array_flip($required), session()->get('permission'))) === count($required))
                        <li class="m-menu__item m-menu__item--submenu m-menu__item--open" aria-haspopup="true"
                            data-menu-submenu-toggle="hover">
                            <a href="#" class="m-menu__link m-menu__toggle">
                                <i class="m-menu__link-icon flaticon-list"></i>
                                <span class="m-menu__link-text">
										{{ trans('main.report') }}
									</span>
                                <i class="m-menu__ver-arrow la la-angle-right"></i>
                            </a>
                            <div class="m-menu__submenu" style="display: block;">
                                <span class="m-menu__arrow"></span>
                                <ul class="m-menu__subnav">
                                    <li class="m-menu__item  m-menu__item--parent" aria-haspopup="true">
                                        <a href="#" class="m-menu__link ">
												<span class="m-menu__link-text">
													{{ trans('main.report') }}
												</span>
                                        </a>
                                    </li>
                                    @if(session()->get('permission.4.use') == true)
                                        <li class="m-menu__item " aria-haspopup="true">
                                            <a href="#" class="m-menu__link ">
                                                <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                                    <span></span>
                                                </i>
                                                <span class="m-menu__link-text">
													{{ trans('main.report_job_list') }}
												</span>
                                            </a>
                                        </li>
                                    @endif

                                    @if(session()->get('permission.4.use') == true)
                                        <li class="m-menu__item " aria-haspopup="true">
                                            <a href="#" class="m-menu__link ">
                                                <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                                    <span></span>
                                                </i>
                                                <span class="m-menu__link-text">
													{{ trans('main.report_hot_work') }}
												</span>
                                            </a>
                                        </li>
                                    @endif
                                </ul>
                            </div>
                        </li>
                    @endif

                    @php($required = [7,8,9,10,11,12])
                    @if(count(array_intersect_key(array_flip($required), session()->get('permission'))) === count($required))
                        <li class="m-menu__item m-menu__item--submenu m-menu__item--open" aria-haspopup="true"
                            data-menu-submenu-toggle="hover">
                            <a href="#" class="m-menu__link m-menu__toggle">
                                <i class="m-menu__link-icon flaticon-interface-2"></i>
                                <span class="m-menu__link-text">
										{{ trans('main.manage') }}
									</span>
                                <i class="m-menu__ver-arrow la la-angle-right"></i>
                            </a>
                            <div class="m-menu__submenu" style="display: block;">
                                <span class="m-menu__arrow"></span>
                                <ul class="m-menu__subnav">
                                    <li class="m-menu__item  m-menu__item--parent" aria-haspopup="true">
                                        <a href="#" class="m-menu__link ">
												<span class="m-menu__link-text">
													{{ trans('main.manage') }}
												</span>
                                        </a>
                                    </li>
                                    @if(session()->get('permission.7.use') == true)
                                        <li class="m-menu__item " aria-haspopup="true">
                                            <a href="{{ route('class.index') }}" class="m-menu__link ">
                                                <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                                    <span></span>
                                                </i>
                                                <span class="m-menu__link-text">
													{{ trans('main.class') }}
												</span>
                                            </a>
                                        </li>
                                    @endif

                                    @if(session()->get('permission.9.use') == true)
                                        <li class="m-menu__item " aria-haspopup="true">
                                            <a href="{{ route('class.location') }}" class="m-menu__link ">
                                                <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                                    <span></span>
                                                </i>
                                                <span class="m-menu__link-text">
                                                    {{ trans('main.location') }}
												</span>
                                            </a>
                                        </li>
                                    @endif

                                    @if(session()->get('permission.8.use') == true)
                                        <li class="m-menu__item " aria-haspopup="true">
                                            <a href="#" class="m-menu__link ">
                                                <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                                    <span></span>
                                                </i>
                                                <span class="m-menu__link-text">
													 {{ trans('main.work_type') }}
												</span>
                                            </a>
                                        </li>
                                    @endif

                                    @if(session()->get('permission.10.use') == true)
                                        <li class="m-menu__item " aria-haspopup="true">
                                            <a href="{{ route('permission.index') }}" class="m-menu__link ">
                                                <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                                    <span></span>
                                                </i>
                                                <span class="m-menu__link-text">
													{{ trans('main.permission') }}
												</span>
                                            </a>
                                        </li>
                                    @endif

                                    @if(session()->get('permission.11.use') == true)
                                        <li class="m-menu__item " aria-haspopup="true">
                                            <a href="{{ route('user.index') }}" class="m-menu__link ">
                                                <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                                    <span></span>
                                                </i>
                                                <span class="m-menu__link-text">
													{{ trans('main.user') }}
												</span>
                                            </a>
                                        </li>
                                    @endif

                                    @if(session()->get('permission.12.use') == true)
                                        <li class="m-menu__item " aria-haspopup="true">
                                            <a href="{{ route('user_permission.index') }}" class="m-menu__link ">
                                                <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                                    <span></span>
                                                </i>
                                                <span class="m-menu__link-text">
													{{ trans('main.user_permission') }}
												</span>
                                            </a>
                                        </li>
                                    @endif
                                </ul>
                            </div>
                        </li>
                    @endif

                @endif

                @if(session()->get('permission_id') == 1)
                    <li class="m-menu__item " aria-haspopup="true">
                        <a href="?page=builder&amp;demo=default" class="m-menu__link ">
                            <i class="m-menu__link-icon flaticon-interface-6"></i>
                            <span class="m-menu__link-text">
                                {{ trans('main.manage_step_job_list') }}
                                {{--Manage Stap Job List--}}
                            </span>
                        </a>
                    </li>
                @endif


            @else
                <li class="m-menu__item  m-menu__item--active" aria-haspopup="true">
                    <a href="?page=index&amp;demo=default" class="m-menu__link ">
                        <i class="m-menu__link-icon flaticon-line-graph"></i>
                        <span class="m-menu__link-title">
                        <span class="m-menu__link-wrap">
                            <span class="m-menu__link-text">{{ trans('main.dashboard') }}</span>
                        </span>
                    </span>
                    </a>
                </li>
                <li class="m-menu__section ">
                    <h4 class="m-menu__section-text">Components</h4>
                    <i class="m-menu__section-icon flaticon-more-v3"></i>
                </li>
                <li class="m-menu__item " aria-haspopup="true">
                    <a href="?page=builder&amp;demo=default" class="m-menu__link ">
                        <i class="m-menu__link-icon flaticon-interface-6"></i>
                        <span class="m-menu__link-text">{{ trans('main.job_list') }}</span>
                    </a>
                </li>
            @endif
        </ul>
    </div>
</div>
