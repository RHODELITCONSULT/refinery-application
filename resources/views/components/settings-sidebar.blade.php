<div class="sidebars settings-sidebar theiaStickySidebar" id="sidebar2">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu5" class="sidebar-menu">
            <ul>
                <li class="submenu-open">
                    <ul>
                        <li class="submenu">
                            <a href="javascript:void(0);"
                                class="{{ Request::is('general-settings', 'security-settings', 'notification', 'connected-apps') ? 'active subdrop' : '' }} "><i
                                    data-feather="settings"></i><span>General Settings</span><span
                                    class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="{{ url('general-settings') }}"
                                        class="{{ Request::is('general-settings') ? 'active' : '' }}">Profile</a></li>
                                <li><a href="{{ url('security-settings') }}"
                                        class="{{ Request::is('security-settings') ? 'active' : '' }}">Security</a></li>
                                <li><a href="{{ url('notification') }}"
                                        class="{{ Request::is('notification') ? 'active' : '' }}">Notifications</a></li>
                                <li class="{{ Request::is('connected-apps') ? 'active' : '' }}"><a
                                        href="{{ url('connected-apps') }}">Connected Apps</a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);"
                                class="{{ Request::is('system-settings', 'company-settings', 'localization-settings', 'prefixes', 'preference', 'appearance', 'social-authentication', 'language-settings', 'language-settings-web') ? 'active subdrop' : '' }} "><i
                                    data-feather="airplay"></i><span>Website Settings</span><span
                                    class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="{{ url('system-settings') }}"
                                        class="{{ Request::is('system-settings') ? 'active' : '' }}">System
                                        Settings</a></li>
                                <li><a href="{{ url('company-settings') }}"
                                        class="{{ Request::is('company-settings') ? 'active' : '' }}">Company Settings
                                    </a>
                                </li>
                                <li><a href="{{ url('localization-settings') }}"
                                        class="{{ Request::is('localization-settings') ? 'active' : '' }}">Localization</a>
                                </li>
                                <li><a href="{{ url('prefixes') }}"
                                        class="{{ Request::is('prefixes') ? 'active' : '' }}">Prefixes</a></li>
                                <li><a href="{{ url('preference') }}"
                                        class="{{ Request::is('preference') ? 'active' : '' }}">Preference</a></li>
                                <li><a href="{{ url('appearance') }}"
                                        class="{{ Request::is('appearance') ? 'active' : '' }}">Appearance</a>
                                </li>
                                <li><a href="{{ url('social-authentication') }}"
                                        class="{{ Request::is('social-authentication') ? 'active' : '' }}">Social
                                        Authentication</a></li>
                                <li><a href="{{ url('language-settings') }}"
                                        class="{{ Request::is('language-settings', 'language-settings-web') ? 'active' : '' }}">Language</a>
                                </li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);"
                                class="{{ Request::is('invoice-settings', 'printer-settings', 'pos-settings', 'custom-fields') ? 'active subdrop' : '' }} "><i
                                    data-feather="archive"></i><span>App
                                    Settings</span><span class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="{{ url('invoice-settings') }}"
                                        class="{{ Request::is('invoice-settings') ? 'active' : '' }}">Invoice</a></li>
                                <li><a href="{{ url('printer-settings') }}"
                                        class="{{ Request::is('printer-settings') ? 'active' : '' }}">Printer </a></li>
                                <li><a href="{{ url('pos-settings') }}"
                                        class="{{ Request::is('pos-settings') ? 'active' : '' }}">POS</a></li>
                                <li><a href="{{ url('custom-fields') }}"
                                        class="{{ Request::is('custom-fields') ? 'active' : '' }}">Custom Fields</a>
                                </li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);"
                                class="{{ Request::is('email-settings', 'sms-gateway', 'otp-settings', 'gdpr-settings') ? 'active subdrop' : '' }} "><i
                                    data-feather="server"></i><span>System
                                    Settings</span><span class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="{{ url('email-settings') }}"
                                        class="{{ Request::is('email-settings') ? 'active' : '' }}">Email</a></li>
                                <li><a href="{{ url('sms-gateway') }}"
                                        class="{{ Request::is('sms-gateway') ? 'active' : '' }}">SMS Gateways</a></li>
                                <li><a href="{{ url('otp-settings') }}"
                                        class="{{ Request::is('otp-settings') ? 'active' : '' }}">OTP</a></li>
                                <li><a href="{{ url('gdpr-settings') }}"
                                        class="{{ Request::is('gdpr-settings') ? 'active' : '' }}">GDPR Cookies</a>
                                </li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);"
                                class="{{ Request::is('payment-gateway-settings', 'bank-settings-grid', 'bank-settings-list', 'tax-rates', 'currency-settings') ? 'active subdrop' : '' }} "><i
                                    data-feather="credit-card"></i><span>Financial
                                    Settings</span><span class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="{{ url('payment-gateway-settings') }}"
                                        class="{{ Request::is('payment-gateway-settings') ? 'active' : '' }}">Payment
                                        Gateway</a></li>
                                <li><a href="{{ url('bank-settings-grid') }}"
                                        class="{{ Request::is('bank-settings-grid', 'bank-settings-list') ? 'active' : '' }}">Bank
                                        Accounts </a>
                                </li>
                                <li><a href="{{ url('tax-rates') }}"
                                        class="{{ Request::is('tax-rates') ? 'active' : '' }}">Tax Rates</a></li>
                                <li><a href="{{ url('currency-settings') }}"
                                        class="{{ Request::is('currency-settings') ? 'active' : '' }}">Currencies</a>
                                </li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);"
                                class="{{ Request::is('storage-settings', 'ban-ip-address') ? 'active subdrop' : '' }} "><i
                                    data-feather="layout"></i><span>Other
                                    Settings</span><span class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="{{ url('storage-settings') }}"
                                        class="{{ Request::is('storage-settings') ? 'active' : '' }}">Storage</a></li>
                                <li><a href="{{ url('ban-ip-address') }}"
                                        class="{{ Request::is('ban-ip-address') ? 'active' : '' }}">Ban IP Address </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>

            </ul>
        </div>
    </div>
</div>
