<template>
  <nav class="scan-navbar is-dark">
    <div class="scan-navbar-container">
        <div class="scan-navbar-start" :class="{'is-opened':opened}">
          <span class="scan-navbar-close" @click.prevent="toggle"></span>
          <router-link to="/" class="scan-navbar-logo m-r-20" exact>
            <img src="/images/logos/logo.svg" alt="Scan DeFi logo" width="45"/> Scan DeFi
          </router-link>
          <div class="scan-navbar-dropdown-container" :class="{'is-opened':dropdowns.opened.includes('blacklist')}">
            <div class="scan-navbar-dropdown">
              <div class="scan-navbar-dropdown-head" @click.prevent="toggleDropdown('blacklist')">
                <router-link class="scan-navbar-item pointer-events-none" to="/blacklist">{{trans('basic.blacklist')}}</router-link>
              </div>
              <div class="scan-navbar-dropdown-content" @click="toggleDropdown('blacklist')">
                <span class="close-content"></span>
                <router-link class="scan-navbar-item" to="/blacklist/tokens">
                  <div class="dropdown-link-container">
                    <div class="dropdown-link-image is-empty"></div>
                    <div class="dropdown-link-content">
                      <div class="dropdown-link-title">{{trans('navbar.tokens')}}</div>
                      <div class="dropdown-link-text">{{trans('navbar.blacklisted_tokens')}}</div>
                    </div>
                  </div>
                </router-link>
                <router-link class="scan-navbar-item" to="/blacklist/wallets">
                  <div class="dropdown-link-container">
                    <div class="dropdown-link-image is-empty"></div>
                    <div class="dropdown-link-content">
                      <div class="dropdown-link-title">{{trans('navbar.wallets')}}</div>
                      <div class="dropdown-link-text">{{trans('navbar.blacklisted_wallets')}}</div>
                    </div>
                  </div>
                </router-link>
              </div>
            </div>
          </div>
          <router-link class="scan-navbar-item" to="/scanner">{{trans('basic.scanner')}}</router-link>
          <div class="scan-navbar-dropdown-container" :class="{'is-opened':dropdowns.opened.includes('education')}">
            <div class="scan-navbar-dropdown">
              <div class="scan-navbar-dropdown-head" @click.prevent="toggleDropdown('education')">
                <router-link class="scan-navbar-item pointer-events-none" to="/education" data-tooltip="Hot">{{trans('basic.education')}}</router-link>
              </div>
              <div class="scan-navbar-dropdown-content" @click="toggleDropdown('education')">
                <span class="close-content"></span>
                <router-link class="scan-navbar-item" to="/academy">
                  <div class="dropdown-link-container">
                    <div class="dropdown-link-image is-empty"></div>
                    <div class="dropdown-link-content">
                      <div class="dropdown-link-title" data-tooltip="New">{{trans('basic.academy')}}</div>
                      <div class="dropdown-link-text">{{trans('navbar.academy_description')}}</div>
                    </div>
                  </div>
                </router-link>
                <router-link class="scan-navbar-item is-muted" to="/battle">
                  <div class="dropdown-link-container">
                    <div class="dropdown-link-image is-empty"></div>
                    <div class="dropdown-link-content">
                      <div class="dropdown-link-title" data-tooltip="Coming soon">{{trans('basic.battle')}}</div>
                      <div class="dropdown-link-text">{{trans('navbar.battle_description')}}</div>
                    </div>
                  </div>
                </router-link>
                <router-link class="scan-navbar-item is-muted" to="/rewards">
                  <div class="dropdown-link-container">
                    <div class="dropdown-link-image is-empty"></div>
                    <div class="dropdown-link-content">
                      <div class="dropdown-link-title" data-tooltip="Coming soon">{{choice('basic.reward', 2)}}</div>
                      <div class="dropdown-link-text">{{trans('navbar.rewards_description')}}</div>
                    </div>
                  </div>
                </router-link>
              </div>
            </div>
          </div>
          <div class="scan-navbar-dropdown-container" :class="{'is-opened':dropdowns.opened.includes('finance')}">
            <div class="scan-navbar-dropdown">
              <div class="scan-navbar-dropdown-head" @click.prevent="toggleDropdown('finance')">
                <router-link class="scan-navbar-item pointer-events-none" to="/finance" data-tooltip="Hot">{{trans('basic.finance')}}</router-link>
              </div>
              <div class="scan-navbar-dropdown-content" @click="toggleDropdown('finance')">
                <span class="close-content"></span>
                <router-link class="scan-navbar-item" to="/staking">
                  <div class="dropdown-link-container">
                    <div class="dropdown-link-image is-empty"></div>
                    <div class="dropdown-link-content">
                      <div class="dropdown-link-title">{{trans('basic.staking')}}</div>
                      <div class="dropdown-link-text">{{trans('navbar.staking_description')}}</div>
                    </div>
                  </div>
                </router-link>
                <router-link class="scan-navbar-item is-muted" to="/farming">
                  <div class="dropdown-link-container">
                    <div class="dropdown-link-image is-empty"></div>
                    <div class="dropdown-link-content">
                      <div class="dropdown-link-title" data-tooltip="Coming soon">{{trans('basic.farming')}}</div>
                      <div class="dropdown-link-text">{{trans('navbar.farming_description')}}</div>
                    </div>
                  </div>
                </router-link>
                <router-link class="scan-navbar-item" to="/swap">
                  <div class="dropdown-link-container">
                    <div class="dropdown-link-image is-empty"></div>
                    <div class="dropdown-link-content">
                      <div class="dropdown-link-title" data-tooltip="New">{{trans('navbar.swap')}}</div>
                      <div class="dropdown-link-text">{{trans('navbar.swap_description')}}</div>
                    </div>
                  </div>
                </router-link>
              </div>
            </div>
          </div>
          <div class="scan-navbar-dropdown-container" :class="{'is-opened':dropdowns.opened.includes('gaming')}">
            <div class="scan-navbar-dropdown">
              <div class="scan-navbar-dropdown-head" @click.prevent="toggleDropdown('gaming')">
                <router-link class="scan-navbar-item pointer-events-none" to="/gaming">{{trans('basic.gaming')}}</router-link>
              </div>
              <div class="scan-navbar-dropdown-content" @click="toggleDropdown('gaming')">
                <span class="close-content"></span>
                <router-link class="scan-navbar-item" to="/games">
                  <div class="dropdown-link-container">
                    <div class="dropdown-link-image is-empty"></div>
                    <div class="dropdown-link-content">
                      <div class="dropdown-link-title">{{choice('basic.game', 2)}}</div>
                      <div class="dropdown-link-text">{{trans('navbar.games_description')}}</div>
                    </div>
                  </div>
                </router-link>
                <router-link class="scan-navbar-item is-muted" to="/nft">
                  <div class="dropdown-link-container">
                    <div class="dropdown-link-image is-empty"></div>
                    <div class="dropdown-link-content">
                      <div class="dropdown-link-title" data-tooltip="Coming soon">{{trans('basic.nft')}}</div>
                      <div class="dropdown-link-text">{{trans('navbar.nft_description')}}</div>
                    </div>
                  </div>
                </router-link>
                <router-link class="scan-navbar-item is-muted" to="/marketplace">
                  <div class="dropdown-link-container">
                    <div class="dropdown-link-image is-empty"></div>
                    <div class="dropdown-link-content">
                      <div class="dropdown-link-title" data-tooltip="Coming soon">{{trans('basic.marketplace')}}</div>
                      <div class="dropdown-link-text">{{trans('navbar.marketplace_description')}}</div>
                    </div>
                  </div>
                </router-link>
              </div>
            </div>
          </div>
          <router-link class="scan-navbar-item" to="/voting-zone">{{trans('basic.voting_zone')}}</router-link>
          <div class="scan-navbar-item community">
            <a target="_blank" href="https://t.me/joinchat/7KiMYEWGo1Q5NDM0"><i class="fab fa-telegram-plane"></i> {{trans('basic.community')}}</a>
          </div>
          <div class="scan-navbar-item tokenomics">
            <router-link to="/scan-defi">Scan DeFi</router-link>
            <!-- <img class="hot-image" src="/images/index/png/Recurso12@2x.png" srcset="/images/index/png/Recurso12@2x.png 1x, /images/index/png/Recurso12@2x.png 2x" alt="Scan Hot"> -->
          </div>
          <router-link class="scan-navbar-item" to="/referral">{{trans('navbar.referral')}}</router-link>
          <!-- <router-link class="scan-navbar-item" to="/partners">Partners</router-link> -->
          <div class="scan-navbar-dropdown-container is-right is-hidden-tablet" :class="{'is-opened':dropdowns.opened.includes('buynow')}">
            <div class="scan-navbar-dropdown">
              <div class="scan-navbar-dropdown-head" @click.prevent="toggleDropdown('buynow')">
                <a class="scan-navbar-item is-success">{{trans('basic.buy_now')}}</a>
              </div>
              <div class="scan-navbar-dropdown-content" @click="toggleDropdown('buynow')">
                <span class="close-content"></span>
                <a class="scan-navbar-item" :href="`https://pancakeswap.finance/swap?outputCurrency=${$root.scan.contract}`" target="_blank">
                  <div class="dropdown-link-container">
                    <div class="dropdown-link-image">
                      <img src="/images/partners/logos/pancakeswap-background.svg" alt="PancakeSwap logo Scan DeFi">
                    </div>
                    <div class="dropdown-link-content">
                      <div class="dropdown-link-title">{{trans('navbar.pancakeswap')}}</div>
                      <div class="dropdown-link-text">{{trans('navbar.exchange')}}</div>
                    </div>
                  </div>
                </a>
                <router-link class="scan-navbar-item" to="/marketplace">
                  <div class="dropdown-link-container">
                    <div class="dropdown-link-image has-bg-primary">
                      <i class="fas fa-gift"></i>
                    </div>
                    <div class="dropdown-link-content">
                      <div class="dropdown-link-title">{{trans('navbar.no_commission')}}</div>
                      <div class="dropdown-link-text">{{trans('navbar.buy_with_usdt')}}</div>
                    </div>
                  </div>
                </router-link>
              </div>
            </div>
          </div>
        </div>

        <div class="scan-navbar-end">
          <router-link class="scan-navbar-item scan-navbar-item-alert" to="/alerts"><i class="fas fa-bell"></i></router-link>
          <!-- <a :href="`https://pancakeswap.finance/swap?outputCurrency=${$root.scan.contract}`" class="scan-navbar-item scan-navbar-item-buy is-success" target="_blank">Buy Now</a> -->
          <!-- <a class="scan-navbar-item scan-navbar-item-buy is-success" @click.prevent="buyModal">Buy Now</a> -->
          <div class="scan-navbar-dropdown-container is-right is-hidden-mobile" :class="{'is-opened':dropdowns.opened.includes('buynow')}">
            <div class="scan-navbar-dropdown">
              <div class="scan-navbar-dropdown-head" @click.prevent="toggleDropdown('buynow')">
                <a class="scan-navbar-item is-success">{{trans('basic.buy_now')}}</a>
              </div>
              <div class="scan-navbar-dropdown-content" @click="toggleDropdown('buynow')">
                <span class="close-content"></span>
                <a class="scan-navbar-item" :href="`https://pancakeswap.finance/swap?outputCurrency=${$root.scan.contract}`" target="_blank">
                  <div class="dropdown-link-container">
                    <div class="dropdown-link-image">
                      <img src="/images/partners/logos/pancakeswap-background.svg" alt="PancakeSwap logo Scan DeFi">
                    </div>
                    <div class="dropdown-link-content">
                      <div class="dropdown-link-title">{{trans('navbar.pancakeswap')}}</div>
                      <div class="dropdown-link-text">{{trans('navbar.exchange')}}</div>
                    </div>
                  </div>
                </a>
                <router-link class="scan-navbar-item" to="/marketplace">
                  <div class="dropdown-link-container">
                    <div class="dropdown-link-image has-bg-primary">
                      <i class="fas fa-gift"></i>
                    </div>
                    <div class="dropdown-link-content">
                      <div class="dropdown-link-title">{{trans('navbar.no_commission')}}</div>
                      <div class="dropdown-link-text">{{trans('navbar.buy_with_usdt')}}</div>
                    </div>
                  </div>
                </router-link>
              </div>
            </div>
          </div>
          <span v-if="$root.wallet.balance !== 0 && $root.settings.website.balance.show" class="scan-navbar-balance no-wrap">
            <img src="/images/logos/icon.svg" alt="Scan DeFi logo" width="20"/>
            {{$root.wallet.balance_text}}
          </span>
          <a id="web3-connect" class="scan-navbar-login scan-navbar-item is-button no-wrap" :class="{'is-loading':$root.web3.loading, 'is-primary':$root.walletConnected}" @click.prevent="$root.connectWalletButtonClick">
            <span v-if="this.$root.walletConnected" class="on-hover-show"><i class="fas fa-power-off m-r-6"></i>{{trans('basic.logout')}}</span>
            <span class="on-hover-hide">{{connectWalletButtonText}}</span>
          </a>

          <!-- SETTINGS -->
          <div class="scan-navbar-dropdown-container scan-navbar-dropdown-settings is-right" :class="{'is-opened':dropdowns.opened.includes('settings')}">
            <div class="scan-navbar-dropdown">
              <div class="scan-navbar-dropdown-head" @click.prevent="toggleDropdown('settings')">
                <div class="scan-navbar-dropdown-button"><i class="fas fa-cog"></i></div>
              </div>
              <div class="scan-navbar-dropdown-content">
                <!-- <span class="close-content"></span> -->
                <div class="settings-section">
                  <div class="settings-section-head">
                    <span class="settings-section-head-title">{{trans('basic.show_balance')}}</span>
                    <b-switch v-model="$root.settings.website.balance.show" size="is-small" type="is-primary"></b-switch>
                  </div>
                </div>
                <div v-if="$root.settings.website.language.selected" class="settings-section is-dropdown" :class="{'is-opened':settings.dropdowns.opened.includes('language')}">
                  <div class="settings-section-head">
                    <span class="settings-section-head-title">{{trans('basic.language')}}</span>
                    <span class="settings-dropdown-trigger" @click.prevent="languagesModal">
                      <scan-language :language="$root.settings.website.language.selected"></scan-language>
                    </span>
                  </div>
                  <!-- <div class="settings-section-dropdown-content">
                    jajajajaja se veeeee
                  </div> -->
                </div>
                <hr>
                <div class="settings-section">
                  <div class="settings-section-head">
                    <span class="settings-section-head-title has-text-white">
                      <a href="https://t.me/joinchat/7KiMYEWGo1Q5NDM0" target="_blank"><i class="fab fa-telegram-plane m-r-5"></i> Telegram</a>
                    </span>
                  </div>
                </div>
                <div class="settings-section">
                  <div class="settings-section-head">
                    <span class="settings-section-head-title has-text-white">
                      <a href="https://twitter.com/ScanDefi" target="_blank"><i class="fab fa-twitter m-r-5"></i> Twitter</a>
                    </span>
                  </div>
                </div>
                <div class="settings-section">
                  <div class="settings-section-head">
                    <span class="settings-section-head-title has-text-white">
                      <a href="https://www.instagram.com/scan_defi/" target="_blank"><i class="fab fa-instagram m-r-5"></i> Instagram</a>
                    </span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
    <div class="scan-navbar-burger" @click.prevent="toggle">
      <span></span>
      <span></span>
      <span></span>
    </div>
  </nav>
</template>

<script>
  import BuyModalForm from '../SCAN/BuyModalForm.vue';
  import LanguagesModal from '../WEB/Languages/Modal.vue';
  
  // import { getChain } from "evm-chains";

  // // Unpkg imports
  // const Web3Modal = window.Web3Modal.default;
  // const WalletConnectProvider = window.WalletConnectProvider.default;
  // // const Fortmatic = window.Fortmatic;

  export default {
    props: {},

    data() {
      return {
        opened: false,
        dropdowns: {
          opened: [],
        },
        settings: {
          dropdowns: {
            opened: [],
          },
        },
      }
    },
    watch: {
      $route (to, from) {
        this.opened = false
      },
      showHowToBuy: {
        inmediate: true,
        deep: true,
        handler(val, oldVal) {
          this.opened = false;
        }
      },
    },

    computed: {
      connectWalletButtonText() {
        //  if (typeof(this.$root.web3.chain.chain) == "undefined")
        //    return this.$root.walletConnected ? this.$root.shortenAddress(this.$root.web3.account) : 'Connect wallet';
        // return this.$root.walletConnected ? this.$root.web3.chain.chain+' '+this.$root.shortenAddress(this.$root.web3.account) : 'Connect wallet';

        try {
          return this.$root.walletConnected ? this.$root.web3.chain.chain+' '+this.$root.shortenAddress(this.$root.web3.account) : this.trans('basic.connect_wallet');
        } catch(error) {
          return this.$root.walletConnected ? this.$root.shortenAddress(this.$root.web3.account) : this.trans('basic.connect_wallet');
        }
      },
    },

    methods: {
      toggle() {
        this.opened = !this.opened;
      },
      buyModal() {
        let vue = this;
        vue.$buefy.modal.open({
          parent: vue,
          animation: 'none',
          component: BuyModalForm,
          canCancel: true,
          props: {},
          events: {},
          onCancel: () => {}
        });
      },
      languagesModal() {
        let vue = this;
        vue.$buefy.modal.open({
          parent: vue,
          animation: 'none',
          component: LanguagesModal,
          canCancel: true,
          props: {},
          events: {
            selected: language => {
              vue.setLanguageSelected(language);
            }
          },
          onCancel: () => {}
        });
      },
      setLanguageSelected(language) {
        // do something if needed
      },
      settingDropdownToggle(setting) {
        let index = this.settings.dropdowns.opened.indexOf(setting);
        if(index === -1) this.settings.dropdowns.opened.push(setting);
        else this.settings.dropdowns.opened.splice(index, 1);
      },
      toggleDropdown(dropdown) {
        let index = this.dropdowns.opened.indexOf(dropdown);
        if(index === -1) this.dropdowns.opened.push(dropdown);
        else this.dropdowns.opened.splice(index, 1);
      },
    },
    mounted() {}
  }
</script>
