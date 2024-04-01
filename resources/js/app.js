/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

Vue.config.devtools = true

require('./src/bootstrap');

window.Vue = require('vue').default;

window.Tx = require('ethereumjs-tx').Transaction;

window.BigNumber = require('./src/bignumber.js');

window.trans = require('./src/trans').methods.trans;
window.choice = require('./src/trans').methods.choice;

Vue.mixin(require('./src/trans'));

// Transitions (https://github.com/Orlandster/vue-page-transition)
import VuePageTransition from 'vue-page-transition';
Vue.use(VuePageTransition);

// Buefy
import Buefy from 'buefy';
Vue.use(Buefy, {
  defaultIconPack: 'fa',
  defaultFirstDayOfWeek: 1,
});

// https://github.com/TriDiamond/vuejs-countdown-timer#readme
import VueCountdownTimer from 'vuejs-countdown-timer';
Vue.use(VueCountdownTimer);

// https://michalsnik.github.io/aos
import AOS from 'aos';

// https://kenwheeler.github.io/slick/
import 'slick-carousel/slick/slick.css';
import Slick from 'vue-slick';

Vue.use(Slick);

// https://github.com/alebeck/vue-randomcolor
import VueRandomColor from 'vue-randomcolor';
Vue.use(VueRandomColor);

// https://github.com/forijk/vue-audio-better
import VueAudio from 'vue-audio-better';
Vue.use(VueAudio);

// https://github.com/surmon-china/vue-quill-editor
import VueQuillEditor from 'vue-quill-editor'
import 'quill/dist/quill.core.css' // import styles
import 'quill/dist/quill.snow.css' // for snow theme
import 'quill/dist/quill.bubble.css' // for bubble theme
Vue.use(VueQuillEditor, /* { default global options } */)

// https://github.com/tonickkozlov/vue-tweet-embed
import { Tweet, Moment, Timeline } from 'vue-tweet-embed';
Vue.use(Tweet);

// https://www.npmjs.com/package/vue-jazzicon
import Jazzicon from 'vue-jazzicon';




// VUE DIRECTIVES
  Vue.directive('click-outside', {
    bind: function (el, binding, vnode) {
      el.clickOutsideEvent = function (event) {
        // here I check that click was outside the el and his childrens
        if (!(el == event.target || el.contains(event.target))) {
          // and if it did, call method provided in attribute value
          vnode.context[binding.expression](event);
        }
      };
      document.body.addEventListener('click', el.clickOutsideEvent)
    },
    unbind: function (el) {
      document.body.removeEventListener('click', el.clickOutsideEvent)
    },
  });


// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

// Vue.component('carousel', carousel);
Vue.component('jazzicon', Jazzicon);
Vue.component('youtube', require('./components/SCAN/YouTube.vue').default);
Vue.component('presale-option', require('./components/SCAN/PresaleOption.vue').default);
Vue.component('copy-address', require('./components/SCAN/CopyAddress.vue').default);
Vue.component('raised-bnb', require('./components/SCAN/RaisedBNB.vue').default);
Vue.component('transaction-checker', require('./components/SCAN/TransactionChecker.vue').default);
Vue.component('media-card', require('./components/SCAN/MediaCard.vue').default);
Vue.component('coin-card', require('./components/SCAN/CoinCard.vue').default);
Vue.component('search-box', require('./components/SCAN/SearchBox.vue').default);
Vue.component('searched-token-card', require('./components/SCAN/SearchedTokenCard.vue').default);
Vue.component('searched-wallet-card', require('./components/SCAN/SearchedWalletCard.vue').default);
Vue.component('blacklist-layout', require('./components/WEB/Blacklist/Layout.vue').default);
Vue.component('blacklisted-tokens-table', require('./components/WEB/Blacklist/Tokens/Table.vue').default);
Vue.component('blacklisted-wallets-table', require('./components/WEB/Blacklist/Wallets/Table.vue').default);
Vue.component('tokenomics-card', require('./components/SCAN/TokenomicsCard.vue').default);
Vue.component('team-card', require('./components/SCAN/TeamCard.vue').default);
Vue.component('scan-general-info', require('./components/SCAN/GeneralInfo.vue').default);
Vue.component('scan-footer', require('./components/SCAN/Footer.vue').default);
Vue.component('scan-language', require('./components/SCAN/Language.vue').default);
Vue.component('scan-comment', require('./components/SCAN/Comment.vue').default);
Vue.component('scan-icon', require('./components/SCAN/Icon.vue').default);
Vue.component('scan-swap', require('./components/SCAN/Swap/Swap.vue').default);
Vue.component('scan-swap-token', require('./components/SCAN/Swap/Token.vue').default);
Vue.component('scan-backdrop', require('./components/SCAN/Backdrop.vue').default);
Vue.component('scan-tweet', Tweet);

Vue.component('not-found', require('./components/WEB/NotFound.vue').default);
Vue.component('web-navbar', require('./components/WEB/Navbar.vue').default);
Vue.component('web-index', require('./components/WEB/Index/Layout.vue').default);
Vue.component('web-how-to-buy', require('./components/WEB/HowToBuy.vue').default);
Vue.component('web-content-creators', require('./components/WEB/ContentCreators.vue').default);
Vue.component('web-quit-token-form', require('./components/WEB/Report/Token/Quit/Form.vue').default);
Vue.component('web-report-token-form', require('./components/WEB/Report/Token/Form.vue').default);
Vue.component('web-report-wallet-form', require('./components/WEB/Report/Wallet/Form.vue').default);
Vue.component('web-referral', require('./components/WEB/Referral.vue').default);
Vue.component('web-referral-table', require('./components/WEB/ReferralTable.vue').default);
Vue.component('web-ranking-table', require('./components/WEB/RankingTable.vue').default);
Vue.component('web-report-token-complaint', require('./components/WEB/Report/Token/Complaint.vue').default);
Vue.component('web-games', require('./components/WEB/Gaming/Games.vue').default);
Vue.component('web-games-stat', require('./components/WEB/Gaming/Stat.vue').default);
Vue.component('web-marketplace-card', require('./components/WEB/Marketplace/Card.vue').default);

Vue.component('web-academy', require('./components/WEB/Academy/Index.vue').default);
Vue.component('web-academy-navbar', require('./components/WEB/Academy/Navbar.vue').default);
Vue.component('web-academy-whitepapers', require('./components/WEB/Academy/Whitepapers.vue').default);
Vue.component('web-courses-carousel', require('./components/WEB/Academy/Courses/Carousel.vue').default);
Vue.component('web-courses-index', require('./components/WEB/Academy/Courses/Index.vue').default);
Vue.component('web-course-card', require('./components/WEB/Academy/Courses/Card.vue').default);
Vue.component('web-course-preview', require('./components/WEB/Academy/Courses/Preview.vue').default);
Vue.component('web-course-show', require('./components/WEB/Academy/Courses/Show.vue').default);
Vue.component('web-course-stats', require('./components/WEB/Academy/Courses/Stats.vue').default);
Vue.component('web-course-buy-button', require('./components/WEB/Academy/Courses/BuyButton.vue').default);
Vue.component('web-course-poster', require('./components/WEB/Academy/Courses/Poster.vue').default);

Vue.component('web-swap-index', require('./components/WEB/Swap/Index.vue'));

/*INDEX COMPONENTS*/
Vue.component('index-coin', require('./components/WEB/Index/IndexCoin.vue').default);
Vue.component('index-ecosystem', require('./components/WEB/Index/IndexEcosystem.vue').default);

/* CLASSROOM */
Vue.component('classroom-lesson', require('./components/CLASSROOM/Lessons/Show.vue').default);
Vue.component('lesson-note-editor', require('./components/CLASSROOM/Lessons/Note.vue').default);

/* STAKING */
Vue.component('scan-staking-list', require('./components/SCAN/Staking/List.vue').default);
Vue.component('scan-staking-card', require('./components/SCAN/Staking/Card.vue').default);
Vue.component('scan-staking-vault', require('./components/SCAN/Staking/Vault.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

import ReportTokenModalForm from './components/WEB/Report/Token/ModalForm.vue';
import QuitTokenModalForm from './components/WEB/Report/Token/Quit/ModalForm.vue';
import ReportWalletModalForm from './components/WEB/Report/Wallet/ModalForm.vue';
import NotificationModal from './components/WEB/Notification/Modal.vue';
import TweetModal from './components/SCAN/Tweet/Modal.vue';
import AlertModal from './components/SCAN/AlertModal.vue';
import Vue from 'vue';


// Router
import router from './router';
import store from './store';
import axios from 'axios';
import moment from 'moment';
import { last, lastIndexOf } from 'lodash';
import MINTOKENSABI from '/abi/tokens/min.json';
import PANCAKE_V2_ABI from '/abi/routers/pancakeswap/v2/abi.json';

const app = new Vue({
  router: router,
  store: store,

  // components: { carousel },

  data() {
      return {
        authuser: null,
        adminwallets: [],
        scan: {
          address: '0xccce542413528cb57b5761e061f4683a1247adcb',
          contract: '0xccce542413528cb57b5761e061f4683a1247adcb',
          checksum: '0xCCcE542413528CB57B5761e061F4683A1247aDCB',
          decimals: 9,
          symbol: 'SCAN',
          abi: [{"inputs":[],"stateMutability":"nonpayable","type":"constructor"},{"anonymous":false,"inputs":[{"indexed":true,"internalType":"address","name":"owner","type":"address"},{"indexed":true,"internalType":"address","name":"spender","type":"address"},{"indexed":false,"internalType":"uint256","name":"value","type":"uint256"}],"name":"Approval","type":"event"},{"anonymous":false,"inputs":[{"indexed":true,"internalType":"address","name":"from","type":"address"},{"indexed":true,"internalType":"address","name":"to","type":"address"},{"indexed":false,"internalType":"uint256","name":"value","type":"uint256"}],"name":"Transfer","type":"event"},{"inputs":[],"name":"_liquidityFee","outputs":[{"internalType":"uint256","name":"","type":"uint256"}],"stateMutability":"view","type":"function"},{"inputs":[],"name":"_taxFee","outputs":[{"internalType":"uint256","name":"","type":"uint256"}],"stateMutability":"view","type":"function"},{"inputs":[{"internalType":"address","name":"owner","type":"address"},{"internalType":"address","name":"spender","type":"address"}],"name":"allowance","outputs":[{"internalType":"uint256","name":"","type":"uint256"}],"stateMutability":"view","type":"function"},{"inputs":[{"internalType":"address","name":"spender","type":"address"},{"internalType":"uint256","name":"amount","type":"uint256"}],"name":"approve","outputs":[{"internalType":"bool","name":"","type":"bool"}],"stateMutability":"nonpayable","type":"function"},{"inputs":[{"internalType":"address","name":"account","type":"address"}],"name":"balanceOf","outputs":[{"internalType":"uint256","name":"","type":"uint256"}],"stateMutability":"view","type":"function"},{"inputs":[],"name":"decimals","outputs":[{"internalType":"uint8","name":"","type":"uint8"}],"stateMutability":"view","type":"function"},{"inputs":[{"internalType":"address","name":"spender","type":"address"},{"internalType":"uint256","name":"subtractedValue","type":"uint256"}],"name":"decreaseAllowance","outputs":[{"internalType":"bool","name":"","type":"bool"}],"stateMutability":"nonpayable","type":"function"},{"inputs":[{"internalType":"address","name":"spender","type":"address"},{"internalType":"uint256","name":"addedValue","type":"uint256"}],"name":"increaseAllowance","outputs":[{"internalType":"bool","name":"","type":"bool"}],"stateMutability":"nonpayable","type":"function"},{"inputs":[],"name":"name","outputs":[{"internalType":"string","name":"","type":"string"}],"stateMutability":"view","type":"function"},{"inputs":[],"name":"symbol","outputs":[{"internalType":"string","name":"","type":"string"}],"stateMutability":"view","type":"function"},{"inputs":[],"name":"totalSupply","outputs":[{"internalType":"uint256","name":"","type":"uint256"}],"stateMutability":"view","type":"function"},{"inputs":[{"internalType":"address","name":"recipient","type":"address"},{"internalType":"uint256","name":"amount","type":"uint256"}],"name":"transfer","outputs":[{"internalType":"bool","name":"","type":"bool"}],"stateMutability":"nonpayable","type":"function"},{"inputs":[{"internalType":"address","name":"sender","type":"address"},{"internalType":"address","name":"recipient","type":"address"},{"internalType":"uint256","name":"amount","type":"uint256"}],"name":"transferFrom","outputs":[{"internalType":"bool","name":"","type":"bool"}],"stateMutability":"nonpayable","type":"function"}],
          addresses: {
            owner: '0xDFa3F6d86370CF4ECB0302144a538EeA3C240773',
            marketing: '0xd1DF3a113581284311796737586212b0c41562f9',
            burn: '0x0000000000000000000000000000000000000001',
          },
          price: {
            bnb: 0,
            busd: 0,
            tokens_per_bnb: 0,
          },
          test: {
            token_address: '0x94Bf4DCC5f983ae58B9F2D4F1271E78D49F7F726',
            token_symbol: 'SCANBF',
            token_decimals: 18,
            token_abi: [{"inputs":[],"stateMutability":"nonpayable","type":"constructor"},{"anonymous":false,"inputs":[{"indexed":true,"internalType":"address","name":"owner","type":"address"},{"indexed":true,"internalType":"address","name":"spender","type":"address"},{"indexed":false,"internalType":"uint256","name":"value","type":"uint256"}],"name":"Approval","type":"event"},{"anonymous":false,"inputs":[{"indexed":true,"internalType":"address","name":"from","type":"address"},{"indexed":true,"internalType":"address","name":"to","type":"address"},{"indexed":false,"internalType":"uint256","name":"value","type":"uint256"}],"name":"Transfer","type":"event"},{"inputs":[],"name":"_liquidityFee","outputs":[{"internalType":"uint256","name":"","type":"uint256"}],"stateMutability":"view","type":"function"},{"inputs":[],"name":"_taxFee","outputs":[{"internalType":"uint256","name":"","type":"uint256"}],"stateMutability":"view","type":"function"},{"inputs":[{"internalType":"address","name":"owner","type":"address"},{"internalType":"address","name":"spender","type":"address"}],"name":"allowance","outputs":[{"internalType":"uint256","name":"","type":"uint256"}],"stateMutability":"view","type":"function"},{"inputs":[{"internalType":"address","name":"spender","type":"address"},{"internalType":"uint256","name":"amount","type":"uint256"}],"name":"approve","outputs":[{"internalType":"bool","name":"","type":"bool"}],"stateMutability":"nonpayable","type":"function"},{"inputs":[{"internalType":"address","name":"account","type":"address"}],"name":"balanceOf","outputs":[{"internalType":"uint256","name":"","type":"uint256"}],"stateMutability":"view","type":"function"},{"inputs":[],"name":"decimals","outputs":[{"internalType":"uint8","name":"","type":"uint8"}],"stateMutability":"view","type":"function"},{"inputs":[{"internalType":"address","name":"spender","type":"address"},{"internalType":"uint256","name":"subtractedValue","type":"uint256"}],"name":"decreaseAllowance","outputs":[{"internalType":"bool","name":"","type":"bool"}],"stateMutability":"nonpayable","type":"function"},{"inputs":[{"internalType":"address","name":"spender","type":"address"},{"internalType":"uint256","name":"addedValue","type":"uint256"}],"name":"increaseAllowance","outputs":[{"internalType":"bool","name":"","type":"bool"}],"stateMutability":"nonpayable","type":"function"},{"inputs":[],"name":"name","outputs":[{"internalType":"string","name":"","type":"string"}],"stateMutability":"view","type":"function"},{"inputs":[],"name":"symbol","outputs":[{"internalType":"string","name":"","type":"string"}],"stateMutability":"view","type":"function"},{"inputs":[],"name":"totalSupply","outputs":[{"internalType":"uint256","name":"","type":"uint256"}],"stateMutability":"view","type":"function"},{"inputs":[{"internalType":"address","name":"recipient","type":"address"},{"internalType":"uint256","name":"amount","type":"uint256"}],"name":"transfer","outputs":[{"internalType":"bool","name":"","type":"bool"}],"stateMutability":"nonpayable","type":"function"},{"inputs":[{"internalType":"address","name":"sender","type":"address"},{"internalType":"address","name":"recipient","type":"address"},{"internalType":"uint256","name":"amount","type":"uint256"}],"name":"transferFrom","outputs":[{"internalType":"bool","name":"","type":"bool"}],"stateMutability":"nonpayable","type":"function"}],
          },
          staking: {
            blocked30: {
              address: '0x67A10F8dC07B9380fc4205174e8d361468e34979',
              abi: [{"inputs":[{"internalType":"uint256[]","name":"_rates","type":"uint256[]"}],"stateMutability":"nonpayable","type":"constructor"},{"anonymous":false,"inputs":[{"indexed":true,"internalType":"address","name":"previousOwner","type":"address"},{"indexed":true,"internalType":"address","name":"newOwner","type":"address"}],"name":"OwnershipTransferred","type":"event"},{"anonymous":false,"inputs":[{"indexed":false,"internalType":"address","name":"account","type":"address"}],"name":"Paused","type":"event"},{"anonymous":false,"inputs":[{"indexed":false,"internalType":"address","name":"account","type":"address"}],"name":"Unpaused","type":"event"},{"inputs":[{"internalType":"uint256","name":"amount","type":"uint256"}],"name":"calculateAPR","outputs":[{"internalType":"uint256","name":"","type":"uint256"}],"stateMutability":"view","type":"function"},{"inputs":[{"internalType":"uint256","name":"amount","type":"uint256"}],"name":"calculateRewards","outputs":[{"internalType":"uint256","name":"","type":"uint256"}],"stateMutability":"view","type":"function"},{"inputs":[{"internalType":"uint256","name":"_rateIndex","type":"uint256"},{"internalType":"uint256","name":"_rate","type":"uint256"}],"name":"changeRate","outputs":[],"stateMutability":"nonpayable","type":"function"},{"inputs":[{"internalType":"uint256[]","name":"vaultIDs","type":"uint256[]"}],"name":"exit","outputs":[],"stateMutability":"nonpayable","type":"function"},{"inputs":[{"internalType":"uint256","name":"amount","type":"uint256"}],"name":"getAPR","outputs":[{"internalType":"uint256","name":"","type":"uint256"}],"stateMutability":"view","type":"function"},{"inputs":[{"internalType":"address","name":"_holder","type":"address"}],"name":"getAllVaultsByHolder","outputs":[{"internalType":"uint256[]","name":"","type":"uint256[]"},{"internalType":"uint256[]","name":"","type":"uint256[]"},{"internalType":"uint256[]","name":"","type":"uint256[]"}],"stateMutability":"view","type":"function"},{"inputs":[{"internalType":"uint256","name":"amount","type":"uint256"}],"name":"getCompensation","outputs":[{"internalType":"uint256","name":"","type":"uint256"}],"stateMutability":"pure","type":"function"},{"inputs":[{"internalType":"address","name":"_holder","type":"address"}],"name":"getHolderVaultAmount","outputs":[{"internalType":"uint256","name":"","type":"uint256"}],"stateMutability":"view","type":"function"},{"inputs":[{"internalType":"address","name":"_holder","type":"address"},{"internalType":"uint256","name":"_index","type":"uint256"}],"name":"getHolderVaultIDAtIndex","outputs":[{"internalType":"uint256","name":"","type":"uint256"}],"stateMutability":"view","type":"function"},{"inputs":[{"internalType":"uint256","name":"_vaultID","type":"uint256"}],"name":"getVaultByID","outputs":[{"components":[{"internalType":"uint256","name":"amount","type":"uint256"},{"internalType":"uint256","name":"unlockTime","type":"uint256"}],"internalType":"struct Vault.Lock","name":"","type":"tuple"}],"stateMutability":"view","type":"function"},{"inputs":[{"internalType":"uint256[]","name":"vaultIDs","type":"uint256[]"}],"name":"harvest","outputs":[],"stateMutability":"nonpayable","type":"function"},{"inputs":[],"name":"owner","outputs":[{"internalType":"address","name":"","type":"address"}],"stateMutability":"view","type":"function"},{"inputs":[],"name":"pause","outputs":[],"stateMutability":"nonpayable","type":"function"},{"inputs":[],"name":"paused","outputs":[{"internalType":"bool","name":"","type":"bool"}],"stateMutability":"view","type":"function"},{"inputs":[{"internalType":"uint256","name":"","type":"uint256"}],"name":"rates","outputs":[{"internalType":"uint256","name":"","type":"uint256"}],"stateMutability":"view","type":"function"},{"inputs":[{"internalType":"uint256[]","name":"vaultIDs","type":"uint256[]"}],"name":"reStake","outputs":[],"stateMutability":"nonpayable","type":"function"},{"inputs":[],"name":"renounceOwnership","outputs":[],"stateMutability":"nonpayable","type":"function"},{"inputs":[],"name":"scan","outputs":[{"internalType":"address","name":"","type":"address"}],"stateMutability":"view","type":"function"},{"inputs":[{"internalType":"uint256","name":"amount","type":"uint256"}],"name":"stake","outputs":[],"stateMutability":"nonpayable","type":"function"},{"inputs":[],"name":"totalRewards","outputs":[{"internalType":"uint256","name":"","type":"uint256"}],"stateMutability":"view","type":"function"},{"inputs":[],"name":"totalStaked","outputs":[{"internalType":"uint256","name":"","type":"uint256"}],"stateMutability":"view","type":"function"},{"inputs":[{"internalType":"address","name":"newOwner","type":"address"}],"name":"transferOwnership","outputs":[],"stateMutability":"nonpayable","type":"function"},{"inputs":[],"name":"unPause","outputs":[],"stateMutability":"nonpayable","type":"function"},{"inputs":[{"internalType":"uint256","name":"amount","type":"uint256"}],"name":"withdrawExcess","outputs":[],"stateMutability":"nonpayable","type":"function"}],
            },
            blocked90: {
              address: '0xbB3ED8C53860Ba2b35E37D495E5E30496d2E3Bf6',
              abi: [{"inputs":[{"internalType":"uint256[]","name":"_rates","type":"uint256[]"}],"stateMutability":"nonpayable","type":"constructor"},{"anonymous":false,"inputs":[{"indexed":true,"internalType":"address","name":"previousOwner","type":"address"},{"indexed":true,"internalType":"address","name":"newOwner","type":"address"}],"name":"OwnershipTransferred","type":"event"},{"anonymous":false,"inputs":[{"indexed":false,"internalType":"address","name":"account","type":"address"}],"name":"Paused","type":"event"},{"anonymous":false,"inputs":[{"indexed":false,"internalType":"address","name":"account","type":"address"}],"name":"Unpaused","type":"event"},{"inputs":[{"internalType":"uint256","name":"amount","type":"uint256"}],"name":"calculateAPR","outputs":[{"internalType":"uint256","name":"","type":"uint256"}],"stateMutability":"view","type":"function"},{"inputs":[{"internalType":"uint256","name":"amount","type":"uint256"}],"name":"calculateRewards","outputs":[{"internalType":"uint256","name":"","type":"uint256"}],"stateMutability":"view","type":"function"},{"inputs":[{"internalType":"uint256","name":"_rateIndex","type":"uint256"},{"internalType":"uint256","name":"_rate","type":"uint256"}],"name":"changeRate","outputs":[],"stateMutability":"nonpayable","type":"function"},{"inputs":[{"internalType":"uint256[]","name":"vaultIDs","type":"uint256[]"}],"name":"exit","outputs":[],"stateMutability":"nonpayable","type":"function"},{"inputs":[{"internalType":"uint256","name":"amount","type":"uint256"}],"name":"getAPR","outputs":[{"internalType":"uint256","name":"","type":"uint256"}],"stateMutability":"view","type":"function"},{"inputs":[{"internalType":"address","name":"_holder","type":"address"}],"name":"getAllVaultsByHolder","outputs":[{"internalType":"uint256[]","name":"","type":"uint256[]"},{"internalType":"uint256[]","name":"","type":"uint256[]"},{"internalType":"uint256[]","name":"","type":"uint256[]"}],"stateMutability":"view","type":"function"},{"inputs":[{"internalType":"uint256","name":"amount","type":"uint256"}],"name":"getCompensation","outputs":[{"internalType":"uint256","name":"","type":"uint256"}],"stateMutability":"pure","type":"function"},{"inputs":[{"internalType":"address","name":"_holder","type":"address"}],"name":"getHolderVaultAmount","outputs":[{"internalType":"uint256","name":"","type":"uint256"}],"stateMutability":"view","type":"function"},{"inputs":[{"internalType":"address","name":"_holder","type":"address"},{"internalType":"uint256","name":"_index","type":"uint256"}],"name":"getHolderVaultIDAtIndex","outputs":[{"internalType":"uint256","name":"","type":"uint256"}],"stateMutability":"view","type":"function"},{"inputs":[{"internalType":"uint256","name":"_vaultID","type":"uint256"}],"name":"getVaultByID","outputs":[{"components":[{"internalType":"uint256","name":"amount","type":"uint256"},{"internalType":"uint256","name":"unlockTime","type":"uint256"}],"internalType":"struct Vault.Lock","name":"","type":"tuple"}],"stateMutability":"view","type":"function"},{"inputs":[{"internalType":"uint256[]","name":"vaultIDs","type":"uint256[]"}],"name":"harvest","outputs":[],"stateMutability":"nonpayable","type":"function"},{"inputs":[],"name":"owner","outputs":[{"internalType":"address","name":"","type":"address"}],"stateMutability":"view","type":"function"},{"inputs":[],"name":"pause","outputs":[],"stateMutability":"nonpayable","type":"function"},{"inputs":[],"name":"paused","outputs":[{"internalType":"bool","name":"","type":"bool"}],"stateMutability":"view","type":"function"},{"inputs":[{"internalType":"uint256","name":"","type":"uint256"}],"name":"rates","outputs":[{"internalType":"uint256","name":"","type":"uint256"}],"stateMutability":"view","type":"function"},{"inputs":[{"internalType":"uint256[]","name":"vaultIDs","type":"uint256[]"}],"name":"reStake","outputs":[],"stateMutability":"nonpayable","type":"function"},{"inputs":[],"name":"renounceOwnership","outputs":[],"stateMutability":"nonpayable","type":"function"},{"inputs":[],"name":"scan","outputs":[{"internalType":"address","name":"","type":"address"}],"stateMutability":"view","type":"function"},{"inputs":[{"internalType":"uint256","name":"amount","type":"uint256"}],"name":"stake","outputs":[],"stateMutability":"nonpayable","type":"function"},{"inputs":[],"name":"totalRewards","outputs":[{"internalType":"uint256","name":"","type":"uint256"}],"stateMutability":"view","type":"function"},{"inputs":[],"name":"totalStaked","outputs":[{"internalType":"uint256","name":"","type":"uint256"}],"stateMutability":"view","type":"function"},{"inputs":[{"internalType":"address","name":"newOwner","type":"address"}],"name":"transferOwnership","outputs":[],"stateMutability":"nonpayable","type":"function"},{"inputs":[],"name":"unPause","outputs":[],"stateMutability":"nonpayable","type":"function"},{"inputs":[{"internalType":"uint256","name":"amount","type":"uint256"}],"name":"withdrawExcess","outputs":[],"stateMutability":"nonpayable","type":"function"}],
            },
            blocked180: {
              address: '0x672B6258F0AFD932af06b29692CB92414F9a970b',
              abi: [{"inputs":[{"internalType":"uint256[]","name":"_rates","type":"uint256[]"}],"stateMutability":"nonpayable","type":"constructor"},{"anonymous":false,"inputs":[{"indexed":true,"internalType":"address","name":"previousOwner","type":"address"},{"indexed":true,"internalType":"address","name":"newOwner","type":"address"}],"name":"OwnershipTransferred","type":"event"},{"anonymous":false,"inputs":[{"indexed":false,"internalType":"address","name":"account","type":"address"}],"name":"Paused","type":"event"},{"anonymous":false,"inputs":[{"indexed":false,"internalType":"address","name":"account","type":"address"}],"name":"Unpaused","type":"event"},{"inputs":[{"internalType":"uint256","name":"amount","type":"uint256"}],"name":"calculateAPR","outputs":[{"internalType":"uint256","name":"","type":"uint256"}],"stateMutability":"view","type":"function"},{"inputs":[{"internalType":"uint256","name":"amount","type":"uint256"}],"name":"calculateRewards","outputs":[{"internalType":"uint256","name":"","type":"uint256"}],"stateMutability":"view","type":"function"},{"inputs":[{"internalType":"uint256","name":"_rateIndex","type":"uint256"},{"internalType":"uint256","name":"_rate","type":"uint256"}],"name":"changeRate","outputs":[],"stateMutability":"nonpayable","type":"function"},{"inputs":[{"internalType":"uint256[]","name":"vaultIDs","type":"uint256[]"}],"name":"exit","outputs":[],"stateMutability":"nonpayable","type":"function"},{"inputs":[{"internalType":"uint256","name":"amount","type":"uint256"}],"name":"getAPR","outputs":[{"internalType":"uint256","name":"","type":"uint256"}],"stateMutability":"view","type":"function"},{"inputs":[{"internalType":"address","name":"_holder","type":"address"}],"name":"getAllVaultsByHolder","outputs":[{"internalType":"uint256[]","name":"","type":"uint256[]"},{"internalType":"uint256[]","name":"","type":"uint256[]"},{"internalType":"uint256[]","name":"","type":"uint256[]"}],"stateMutability":"view","type":"function"},{"inputs":[{"internalType":"uint256","name":"amount","type":"uint256"}],"name":"getCompensation","outputs":[{"internalType":"uint256","name":"","type":"uint256"}],"stateMutability":"pure","type":"function"},{"inputs":[{"internalType":"address","name":"_holder","type":"address"}],"name":"getHolderVaultAmount","outputs":[{"internalType":"uint256","name":"","type":"uint256"}],"stateMutability":"view","type":"function"},{"inputs":[{"internalType":"address","name":"_holder","type":"address"},{"internalType":"uint256","name":"_index","type":"uint256"}],"name":"getHolderVaultIDAtIndex","outputs":[{"internalType":"uint256","name":"","type":"uint256"}],"stateMutability":"view","type":"function"},{"inputs":[{"internalType":"uint256","name":"_vaultID","type":"uint256"}],"name":"getVaultByID","outputs":[{"components":[{"internalType":"uint256","name":"amount","type":"uint256"},{"internalType":"uint256","name":"unlockTime","type":"uint256"}],"internalType":"struct Vault.Lock","name":"","type":"tuple"}],"stateMutability":"view","type":"function"},{"inputs":[{"internalType":"uint256[]","name":"vaultIDs","type":"uint256[]"}],"name":"harvest","outputs":[],"stateMutability":"nonpayable","type":"function"},{"inputs":[],"name":"owner","outputs":[{"internalType":"address","name":"","type":"address"}],"stateMutability":"view","type":"function"},{"inputs":[],"name":"pause","outputs":[],"stateMutability":"nonpayable","type":"function"},{"inputs":[],"name":"paused","outputs":[{"internalType":"bool","name":"","type":"bool"}],"stateMutability":"view","type":"function"},{"inputs":[{"internalType":"uint256","name":"","type":"uint256"}],"name":"rates","outputs":[{"internalType":"uint256","name":"","type":"uint256"}],"stateMutability":"view","type":"function"},{"inputs":[{"internalType":"uint256[]","name":"vaultIDs","type":"uint256[]"}],"name":"reStake","outputs":[],"stateMutability":"nonpayable","type":"function"},{"inputs":[],"name":"renounceOwnership","outputs":[],"stateMutability":"nonpayable","type":"function"},{"inputs":[],"name":"scan","outputs":[{"internalType":"address","name":"","type":"address"}],"stateMutability":"view","type":"function"},{"inputs":[{"internalType":"uint256","name":"amount","type":"uint256"}],"name":"stake","outputs":[],"stateMutability":"nonpayable","type":"function"},{"inputs":[],"name":"totalRewards","outputs":[{"internalType":"uint256","name":"","type":"uint256"}],"stateMutability":"view","type":"function"},{"inputs":[],"name":"totalStaked","outputs":[{"internalType":"uint256","name":"","type":"uint256"}],"stateMutability":"view","type":"function"},{"inputs":[{"internalType":"address","name":"newOwner","type":"address"}],"name":"transferOwnership","outputs":[],"stateMutability":"nonpayable","type":"function"},{"inputs":[],"name":"unPause","outputs":[],"stateMutability":"nonpayable","type":"function"},{"inputs":[{"internalType":"uint256","name":"amount","type":"uint256"}],"name":"withdrawExcess","outputs":[],"stateMutability":"nonpayable","type":"function"}],
            },
          },
        },
        web3: {
          modal: null,
          provider: null,
          account: null,
          chain: {},
          loading: false,
          swap: null,
        },
        wallet: {
          address: null,
          balance: 0,
          balance_text: null,
          tokens: [],
          bnb_balance: 0,
          bnb_balance_text: null,
        },
        chains: [],
        settings: {
          website: {
            balance: {
              show: true,
            },
            language:{
              selected: {locale:'en', name:'English', flag:'gb', active:true},
            },
          },
        },
        languages: [],
        pancakeswap: {
          v2: {
            router: {
              address: '0x10ED43C718714eb63d5aA57B78B54704E256024E',
              abi: PANCAKE_V2_ABI,
            }
          }
        }
      }
  },

  watch: {
    $route (to, from) {
      let vue = this;
      setTimeout(function(){
        vue.setRouterLayoutClass();
      }, 200);
      vue.destroyModals();
      if(from.meta.layout !== to.meta.layout) location.reload();
    },
    settings: {
      deep: true,
      inmediate: true,
      handler(settings) {
        localStorage.setItem('settings', JSON.stringify(settings));
        window._settings = settings;
      },
    },
    languages: {
      deep: true,
      inmediate: true,
      handler(languages) {
        localStorage.setItem('languages', JSON.stringify(languages));
      },
    },
    'web3.account': {
      deep: true,
      inmediate: true,
      handler(wallet) {
        if(wallet) this.$emit('web3.account', this.checksumaddress(wallet));

      },
    },
  },

  computed: {
    multilang() {
      return window._multilang;
    },
    translations() {
      return this.multilang[this.settings.website.language.selected.locale] || this.multilang.en;
    },
    walletConnected() {
      // return this.$store.state.Authuser.authuser && this.web3.account && this.web3.chain;
      // return this.authuser && this.web3.account && this.web3.chain;
      return this.web3.account;
    },
    bnbAddress() {
      if(!this.$root.web3.chain || this.$root.web3.chain.chainId) return '0xbb4CdB9CBd36B01bD1cBaEBF2De08d9173bc095c';
      if(this.$root.web3.chain.chainId === 56) return '0xbb4CdB9CBd36B01bD1cBaEBF2De08d9173bc095c';
      if(this.$root.web3.chain.chainId === 97) return '0xae13d989daC2f0dEbFf460aC112a837C89BAa7cd';
      return '0xbb4CdB9CBd36B01bD1cBaEBF2De08d9173bc095c';
    },
    pancakeswapV2RouterAddress() {
      if(!this.$root.web3.chain || this.$root.web3.chain.chainId) return '0x10ED43C718714eb63d5aA57B78B54704E256024E';
      if(this.$root.web3.chain.chainId === 56) return '0x10ED43C718714eb63d5aA57B78B54704E256024E';
      if(this.$root.web3.chain.chainId === 97) return '0x9ac64cc6e4415144c455bd8e4837fea55603e5c3';
      return '0x10ED43C718714eb63d5aA57B78B54704E256024E';
    },
  },

  methods: {
    init() {
      this.setRouterLayoutClass();
      this.setStoredSettings();
      this.setRererrer();
      // this.getAuthuser();
      this.initWallet();
      AOS.init();
      this.getLanguages();
      // this.checkTweetClosedTodayOrShow();
    },
    checkTweetClosedTodayOrShow() {
      let lastview = localStorage.getItem('tweet.lastview');

      if(!lastview || moment().format('YYYY-MM-DD') < lastview){
        this.showTweetModal('1462828290612383756');
        localStorage.setItem('tweet.lastview', moment().format('YYYY-MM-DD'));
      }
    },
    setRouterLayoutClass() {
      document.getElementById('app').classList.value = this.$route.meta.layout;
    },
    setStoredSettings() {
      let settings = localStorage.getItem('settings');
      if(settings){
        settings = JSON.parse(settings);
        if(settings.website){
          if(settings.website.balance){
            this.settings.website.balance.show = settings.website.balance.show || true;
          }
          if(settings.website.language){
            this.settings.website.language.selected = settings.website.language.selected || {locale:'en', name:'English', flag:'gb', active:true};
          }
        }
      }

      localStorage.setItem('settings', JSON.stringify(this.settings));
    },
    destroyModals() {
      document.querySelectorAll('.modal.is-active').forEach((modal) => {
        console.info(modal);
        modal.__vue__?.$vnode?.context?.close();
      });
    },
    checksumaddress(address) {
      return Web3.utils.toChecksumAddress(address);
    },
    async getChains() {
      await axios.get('/api/chains').then(response => {
        this.chains = response.data;
        localStorage.setItem('chains', JSON.stringify(response.data));
      });
    },
    getAuthuser() {
      axios.get('/api/authuser').then(response => {
        this.authuser = response.data;
      });
    },
    getLanguages() {
      axios.get('/api/languages/active').then(response => {
        this.languages = response.data.languages;
      });
    },
    shortenAddress(address = null, length = 4) {
      if(!address) return '';
      return address.slice(0, length)+'...'+address.slice(-length);
    },
    clipboard(text = null, message = null){
      message = message ? message : 'Copied to clipboard!';
      let id = "mycustom-clipboard-textarea-hidden-id";
      let existsTextarea = document.getElementById(id);

      if(!existsTextarea){
        // console.log("Creating textarea");
        let textarea = document.createElement("textarea");
        textarea.id = id;
        // Place in top-left corner of screen regardless of scroll position.
        textarea.style.position = 'fixed';
        textarea.style.top = 0;
        textarea.style.left = 0;

        // Ensure it has a small width and height. Setting to 1px / 1em
        // doesn't work as this gives a negative w/h on some browsers.
        textarea.style.width = '1px';
        textarea.style.height = '1px';

        // We don't need padding, reducing the size if it does flash render.
        textarea.style.padding = 0;

        // Clean up any borders.
        textarea.style.border = 'none';
        textarea.style.outline = 'none';
        textarea.style.boxShadow = 'none';

        // Avoid flash of white box if rendered for any reason.
        textarea.style.background = 'transparent';
        document.querySelector("body").appendChild(textarea);
        // console.log("The textarea now exists :)");
        existsTextarea = document.getElementById(id);
      }else{
        // console.log("The textarea already exists :3")
      }

      existsTextarea.value = text;
      existsTextarea.select();

      try {
        let status = document.execCommand('copy');
        if(status){
          // console.log("The text is now on the clipboard");
          this.$buefy.toast.open({message: message, type: 'is-success'});
        }else{
          // console.error("Cannot copy text");
        }
      } catch (err) {
        // console.log('Unable to copy.');
      }
    },
    joinArray(array){
      if(array.length === 0) return '';
      else if(array.length === 1) return array[0];
      else if(array.length === 2) return array.join(' and ');
      else if(array.length > 2) return array.slice(0, -1).join(', ') + ', and ' + array.slice(-1);
    },
    cloneObject(obj) {
      return JSON.parse(JSON.stringify(obj));
    },
    shortDuration(minutes) {
      let duration = moment.duration(minutes, 'minutes');
      let yr = duration.years();
      let mo = duration.months();
      let d = duration.days();
      let h = duration.hours();
      let m = duration.minutes();
      let years = yr ? `${yr}yr ` : '';
      let months = mo ? `${mo}mth ` : '';
      let days = d ? `${d}d ` : '';
      let hours = h ? `${h}h ` : '';
      let mins = m ? `${m}m` : '';
      return `${years}${months}${days}${hours}${mins}`;
    },
    scrollto(target = null, speed = 800, offset = 60, scrollelem = 'html, body') {
      $(scrollelem).stop().animate({scrollTop: $(target).offset().top - offset}, speed);
    },
    timeAgo(date) {
      return moment(date).fromNow();
    },
    formatDate(date, separator = '.') {
      return moment(date).format(`DD${separator}MM${separator}YYYY`);
    },
    formatDateTime(date, separator = '.') {
      return moment(date).format(`DD${separator}MM${separator}YYYY HH:mm`);
    },
    formatTimestamp(timestamp, separator = '.') {
      return moment.unix(timestamp).format(`DD${separator}MM${separator}YYYY HH:mm`);
    },
    formatDecimals(amount, decimals = 18, fixed = 2) {
      return parseFloat(amount / 10**decimals).toFixed(fixed);
    },
    formatMoney(amount, currency = 'USD', removeZeros = false, emptyDefault = '-'){
      // if(!amount || parseFloat(amount) <= 0) return emptyDefault;
      // let locale = `US`;
      // let formatted =  new Intl.NumberFormat(locale, {style: 'currency', currency: currency }).format(amount);
      // if(removeZeros) formatted = formatted.replace(',00', '', formatted);
      // return formatted;
      if(!amount || parseFloat(amount) <= 0) return emptyDefault;

      let formatConfig = {
        style: "currency",
        currency: currency, // CNY for Chinese Yen, EUR for Euro
        minimumFractionDigits: 2,
        currencyDisplay: "symbol",
      };

      let formatted = new Intl.NumberFormat("en-GB", formatConfig).format(amount);
      if(removeZeros) formatted = formatted.replace('.00', '', formatted);
      formatted = formatted.replace('US$', '$ ', formatted);
      return formatted;
    },
    formatNumber(number, removeZeros = false, emptyDefault = '0') {
      if(!number || parseFloat(number) <= 0) return emptyDefault;
      let formatted = new Intl.NumberFormat("en-GB").format(number);
      if(removeZeros) formatted = formatted.replace('.00', '', formatted);
      return formatted;
    },
    formatTokenBalance(amount, decimals = 18, fixed = 2) {
      return this.formatDecimals(amount, decimals, fixed);
    },
    formatTokenBalanceText(amount, decimals = 18, fixed = 2, symbol = null) {
      let balance = this.formatNumber(this.formatTokenBalance(amount, decimals, fixed));
      return symbol ? `${balance} ${symbol}`: balance;
    },
    countZeros(number) {
      let count = 0;
      while (!~~number) {
        count++;
        number *= 10;
      }
      return count ? count - 1 : 0;
    },
    formatPrice(price, afterZeros = 3) {
      if(parseInt(price) >= 1) return parseFloat(price).toFixed(afterZeros);
      return this.formatDecimals(price, 0, this.countZeros(price) + afterZeros);
    },
    notify(notification, title, canCancel) {
      let vue = this;

      notification = notification || this.trans('basic.keep_calm');

      vue.$buefy.modal.open({
        parent: vue,
        animation: 'none',
        component: NotificationModal,
        canCancel: canCancel,
        props: { notification: notification, title: title },
        events: {
          reported: token => {
          },
        },
        onCancel: () => {}
      });
    },
    showTweetModal(tweet) {
      let vue = this;
      vue.$buefy.modal.open({
        parent: vue,
        animation: 'none',
        component: TweetModal,
        canCancel: true,
        props: { tweetId: tweet },
        events: {},
        onCancel: () => {}
      });
    },
    notifyWorkingOnIt(canCancel = true) {
      let notification = `<div class="has-text-centered">We are working on it.<br/><br/><a href="https://pancakeswap.finance/swap?outputCurrency=${this.scan.contract}" target="_blank">KEEP CALM AND GET MORE SCAN</a></div>`;
      this.notify(notification, null, canCancel);
    },
    showToast(message = 'Something went wrong...', type = 'is-success', position = 'is-top', duration = 5000){
      this.$buefy.toast.open({type: type, queue: false, duration: duration, position: position, message: message });
    },
    showAlert(title, message) {
      let vue = this;
      vue.$buefy.modal.open({
        parent: vue,
        animation: 'none',
        component: AlertModal,
        canCancel: true,
        props: { title: title, message: message },
        events: {
          reported: token => {
          },
        },
        onCancel: () => {}
      });
    },
    async loginOrRegister(wallet = null) {
      // await this.$store.dispatch('loginOrRegister', wallet);
      wallet = wallet ? wallet : this.web3.account;
      if(!wallet) return;

      let referrer = localStorage.getItem('referrer');
      let data = { wallet:wallet, referrer:referrer };

      axios.get('/sanctum/csrf-cookie').then(response => {
        axios.post(`/api/users/login-or-register`, data).then(response => {
          this.authuser = response.data.user;
          this.$store.dispatch('Authuser/getAuthuser');
          this.getWalletScanBalance(wallet);
        }).catch(error => {
          console.info(error);
        });
      });
    },
    async logout(wallet = null) {
      wallet = wallet ? wallet : this.web3.account;

      axios.post(`/api/users/logout`, {wallet:wallet}).then(response => {
        this.authuser = response.data.user;
        this.$store.dispatch('Authuser/getAuthuser');
        this.removeWalletData();
      }).catch(error => {
        console.info(error);
      });
    },
    getWalletTokenBalance(address = null, contractaddress = null) {
      address = address ? address : (this.web3 && this.web3.account ? this.web3.account : null);
      if(!address) return;
      let scancontract = this.scan.contract;
      let data = { module:'account', action:'tokenbalance', contractaddress: contractaddress ? contractaddress : scancontract, address:address, tag:'latest' };
      axios.post(`/api/bsc/request`, data).then(response => {
        this.wallet.balance = this.formatTokenBalance(response.data.result, 9, 0);
        this.wallet.balance_text = this.formatTokenBalanceText(response.data.result, 9, 0);
      });
    },
    getWalletScanBalance(address = null, token = null) {
      this.getWalletTokenBalance(address)
    },
    removeWalletData() {
      this.wallet.address = null;
      this.wallet.balance = 0;
      this.wallet.balance_text = null;
      this.wallet.tokens = [];
    },
    report(type, item) {
      if(type === 'token') this.reportToken(item);
      if(type === 'wallet') this.reportWallet(item);
    },
    async reportToken(token = null) {
      if(token && token.address === this.scan.contract) return;

      if(!this.walletConnected) await this.$root.connectWallet();

      let vue = this;
      vue.$buefy.modal.open({
        parent: vue,
        animation: 'none',
        component: ReportTokenModalForm,
        canCancel: true,
        props: { token: token },
        events: {
          reported: token => {},
        },
        onCancel: () => {}
      });
    },
    async quitToken(token = null) {
      if(!this.walletConnected) await this.$root.connectWallet();

      let vue = this;
      vue.$buefy.modal.open({
        parent: vue,
        animation: 'none',
        component: QuitTokenModalForm,
        canCancel: true,
        props: { wallet: vue.web3.account, token: token },
        events: {
          quit: token => {},
        },
        onCancel: () => {}
      });
    },
    async reportWallet(wallet = null) {
      if(wallet && this.adminwallets.includes(wallet.address)) return;

      if(!this.walletConnected) await this.$root.connectWallet();

      let vue = this;
      vue.$buefy.modal.open({
        parent: vue,
        animation: 'none',
        component: ReportWalletModalForm,
        canCancel: true,
        props: { wallet: wallet },
        events: {
          reported: wallet => {},
        },
        onCancel: () => {}
      });
    },
    setRererrer(){
      let params = new URLSearchParams(window.location.search);
      let referrer = params.get('referrer');
      if(referrer){
        localStorage.setItem('referrer', referrer);
        let url = window.location.href.replace(`?referrer=${referrer}`, '').replace(`&referrer=${referrer}`, '');
        window.history.pushState({}, null, url);
      }
    },
    setPageUrl(url, title = null, info = {}){
      window.history.pushState({}, null, url);
    },
    scanToken(token = null) {
      let address = null;
      if(token.address) address = token.address;
      if(token.contract_address) address = token.contract_address;
      if(!token || !address || token === 'scan') address = this.scan.contract;

      if(this.$route.name !== 'scanner.token' || (this.$route.name === 'scanner.token' && this.$route.params.address !== address)){
        this.$router.push({ name: 'scanner.token', params: { address: address } });
      }
    },
    scanWallet(wallet = null) {
      if(!wallet || !wallet.address) return;

      if(this.$route.name !== 'scanner.wallet' || (this.$route.name === 'scanner.wallet' && this.$route.params.address !== wallet.address)){
        this.$router.push({ name: 'scanner.wallet', params: { address: wallet.address } });
      }
    },
    calculateBlockedAPY(apr, period) {
      let number = 365/period;
      return parseFloat((1 + apr / number)**number-1).toFixed(2);
    },



    /*********************
    * API GLOBAL FUNCTIONS
    **********************/

    pancakeTokenInfo(address = null) {
      address = address ? address : this.scan.contract;
      if(address === '0xb8c77482e45f1f44de1745f52c74426c631bdd52'){ // BNB
        let data = { module:'stats', action:'bnbprice' };
        return axios.post(`/api/bsc/request`, data).then(response => {
          return {
            data: {
              name: 'Binance Coin',
              symbol: 'BNB',
              price: response.data.result.ethusd,
              price_BNB: 1,
            },
          };
        });
      }
      return axios.get(`/api/pancake/tokens/${address}`).then(response => response.data);
    },
    coingeckoTokenInfo(token = null) {
      token = token ? token : 'scan-defi';
      return axios.get(`/api/coingecko/tokens/${token}`).then(response => response.data);
    },
    tokenHistoryPrice(symbol = 'SCAN') {
      const now = moment().set('seconds', 0).set('milliseconds', 0);
      const remainder = 0 - (now.minute() % 5);
      const endDate = moment(now).add(remainder, 'minutes');
      const end = endDate.valueOf();
      const startDate = endDate.subtract(1, 'days');
      const start = startDate.valueOf();
      return axios.get(`/api/livecoinwatch/tokens/${symbol}/history/${start}/${end}`).then(response => response.data);
    },
    walletBalances(address = null) {
      if(!address) return;
      return axios.get(`/api/cov/wallets/${address}/balances`).then(response => response.data);
    },


    /*****************
    * WALLET FUNCTIONS
    ******************/

      connectWalletButtonClick() {
        this.walletConnected ? this.disconnectWallet() : this.connectWallet();
      },
      async initWallet() {
        const Web3Modal = window.Web3Modal.default;
        const WalletConnectProvider = window.WalletConnectProvider.default;

        const providerOptions = {
            walletconnect: {
                package: WalletConnectProvider, // required
                options: {
                  rpc: { 56: 'https://bsc-dataseed.binance.org/', },
                  network: "binance",
                }
            },
        };

        this.web3.modal = new Web3Modal({
            network: "mainnet", // optional
            cacheProvider: true, // optional
            providerOptions, // required
            disableInjectedProvider: false, // optional. For MetaMask / Brave / Opera.
            theme: 'dark'
        });

        if(this.web3.modal && this.web3.modal.cachedProvider){
          this.web3.loading = true;
          this.connectWallet();
        }
      },
      async fetchAccountData() {
        if(!this.web3.provider) return;

        try{
          // Get a Web3 instance for the wallet
          const web3 = new Web3(this.web3.provider);

          // Get connected chain id from Ethereum node
          const chainId = typeof(ethereum) !== 'undefined' ? await parseInt(ethereum.networkVersion) : await web3.eth.getChainId();

          // Load chain information over an HTTP API
          if(!this.chains || !this.chains.length){
            if(localStorage.getItem('chains')){
              this.chains = JSON.parse(localStorage.getItem('chains'));
            }else{
              await this.getChains();
            }
          }
          this.web3.chain = this.chains.find(o => o.chainId === chainId);
          // console.info('chain', chainId, this.web3.chain);

          // Get list of accounts of the connected wallet
          if(typeof(ethereum) !== 'undefined'){
            await ethereum.request({ method: 'eth_accounts' }).then(accounts => {
              this.web3.loading = false;
              this.web3.account = accounts[0];
              this.wallet.address = this.web3.account;

              this.getETHBalance();
            }).catch(error => {
              console.info(error);
            });
          }else{
            await web3.eth.getAccounts().then(accounts => {
              this.web3.loading = false;
              this.web3.account = accounts[0];
              this.wallet.address = this.web3.account;

              this.getETHBalance();
            }).catch(error => {
              console.info(error);
            });
          }

        }catch(error){
          this.showToast(error, 'is-danger');
          return;
        }
      },
      async getETHBalance() {
        const web3 = new Web3(this.web3.provider);
        await web3.eth.getBalance(this.wallet.address).then(balance => {
          this.wallet.bnb_balance = balance
          this.wallet.bnb_balance_text = this.formatTokenBalance(balance, 18, 6);
        });
      },
      async refreshAccountData() {
        await this.fetchAccountData();
        this.loginOrRegister();
      },
      async connectWallet() {
        try{
          this.web3.provider = await this.web3.modal.connect();
        }catch(error){
          console.info("Could not get a wallet connection", error);
          return;
        }

        // Subscribe to accounts change
        this.web3.provider.on("accountsChanged", (accounts) => {
          console.info('accountsChanged');
          this.web3.loading = true;
          if(this.web3.account && accounts && accounts.length) this.refreshAccountData();
          else this.disconnectWallet();
        });

        // Subscribe to chainId change
        this.web3.provider.on("chainChanged", (chainId) => {
          console.info('chainChanged');
          this.web3.loading = true;
          this.fetchAccountData();
        });

        // Subscribe to networkId change
        this.web3.provider.on("networkChanged", (networkId) => {
          console.info('networkChanged');
          this.web3.loading = true;
          this.fetchAccountData();
        });

        // Disconnect
        this.web3.provider.on("disconnect", (data) => {
          console.info('disconnect');
          this.web3.loading = true;
          // this.disconnectWallet();
        });

        await this.refreshAccountData();
      },
      async disconnectWallet() {
        // console.log("Killing the wallet connection", this.web3.provider);
        await this.web3.modal.clearCachedProvider();

        // if(this.web3.provider && this.web3.provider.disconnect) {
        //   await this.web3.provider.disconnect();
        //   // this.web3.provider = null;
        // }
        // else if(this.web3.provider && this.web3.provider.close) {
        //   await this.web3.provider.close();
        //   this.web3.provider = null;
        // }

        this.logout();
        this.web3.provider = null;
        this.web3.account = null;
        this.web3.chain = null;
      },
      // async loadSwapContract() {
      //   if(window.ethereum){
      //     window.web3 = new Web3(window.ethereum);
      //     window.ethereum.enable();
      //     this.web3.swap =  await new window.web3.eth.Contract([{"inputs":[{"internalType":"address","name":"dexAddress","type":"address"},{"internalType":"address","name":"BurnWallet","type":"address"}],"stateMutability":"nonpayable","type":"constructor"},{"anonymous":false,"inputs":[{"indexed":true,"internalType":"address","name":"owner","type":"address"},{"indexed":true,"internalType":"address","name":"spender","type":"address"},{"indexed":false,"internalType":"uint256","name":"value","type":"uint256"}],"name":"Approval","type":"event"},{"anonymous":false,"inputs":[{"indexed":false,"internalType":"uint256","name":"minTokensBeforeSwap","type":"uint256"}],"name":"MinTokensBeforeSwapUpdated","type":"event"},{"anonymous":false,"inputs":[{"indexed":true,"internalType":"address","name":"previousOwner","type":"address"},{"indexed":true,"internalType":"address","name":"newOwner","type":"address"}],"name":"OwnershipTransferred","type":"event"},{"anonymous":false,"inputs":[{"indexed":false,"internalType":"uint256","name":"tokensSwapped","type":"uint256"},{"indexed":false,"internalType":"uint256","name":"ethReceived","type":"uint256"},{"indexed":false,"internalType":"uint256","name":"tokensIntoLiqudity","type":"uint256"}],"name":"SwapAndLiquify","type":"event"},{"anonymous":false,"inputs":[{"indexed":false,"internalType":"bool","name":"enabled","type":"bool"}],"name":"SwapAndLiquifyEnabledUpdated","type":"event"},{"anonymous":false,"inputs":[{"indexed":true,"internalType":"address","name":"from","type":"address"},{"indexed":true,"internalType":"address","name":"to","type":"address"},{"indexed":false,"internalType":"uint256","name":"value","type":"uint256"}],"name":"Transfer","type":"event"},{"inputs":[],"name":"_liquidityFee","outputs":[{"internalType":"uint256","name":"","type":"uint256"}],"stateMutability":"view","type":"function"},{"inputs":[],"name":"_maxTxAmount","outputs":[{"internalType":"uint256","name":"","type":"uint256"}],"stateMutability":"view","type":"function"},{"inputs":[],"name":"_taxFee","outputs":[{"internalType":"uint256","name":"","type":"uint256"}],"stateMutability":"view","type":"function"},{"inputs":[{"internalType":"address[]","name":"addresses","type":"address[]"},{"internalType":"uint256[]","name":"amounts","type":"uint256[]"}],"name":"airdrop","outputs":[],"stateMutability":"payable","type":"function"},{"inputs":[{"internalType":"address","name":"owner","type":"address"},{"internalType":"address","name":"spender","type":"address"}],"name":"allowance","outputs":[{"internalType":"uint256","name":"","type":"uint256"}],"stateMutability":"view","type":"function"},{"inputs":[{"internalType":"address","name":"spender","type":"address"},{"internalType":"uint256","name":"amount","type":"uint256"}],"name":"approve","outputs":[{"internalType":"bool","name":"","type":"bool"}],"stateMutability":"nonpayable","type":"function"},{"inputs":[{"internalType":"address","name":"account","type":"address"}],"name":"balanceOf","outputs":[{"internalType":"uint256","name":"","type":"uint256"}],"stateMutability":"view","type":"function"},{"inputs":[],"name":"decimals","outputs":[{"internalType":"uint8","name":"","type":"uint8"}],"stateMutability":"view","type":"function"},{"inputs":[{"internalType":"address","name":"spender","type":"address"},{"internalType":"uint256","name":"subtractedValue","type":"uint256"}],"name":"decreaseAllowance","outputs":[{"internalType":"bool","name":"","type":"bool"}],"stateMutability":"nonpayable","type":"function"},{"inputs":[{"internalType":"uint256","name":"tAmount","type":"uint256"}],"name":"deliver","outputs":[],"stateMutability":"nonpayable","type":"function"},{"inputs":[],"name":"disableWhitelistPermanently","outputs":[],"stateMutability":"nonpayable","type":"function"},{"inputs":[{"internalType":"address","name":"account","type":"address"}],"name":"excludeFromFee","outputs":[],"stateMutability":"nonpayable","type":"function"},{"inputs":[{"internalType":"address","name":"account","type":"address"}],"name":"excludeFromReward","outputs":[],"stateMutability":"nonpayable","type":"function"},{"inputs":[],"name":"geUnlockTime","outputs":[{"internalType":"uint256","name":"","type":"uint256"}],"stateMutability":"view","type":"function"},{"inputs":[],"name":"getBurnWallet","outputs":[{"internalType":"address","name":"","type":"address"}],"stateMutability":"view","type":"function"},{"inputs":[],"name":"getMarketingWallet","outputs":[{"internalType":"address","name":"","type":"address"}],"stateMutability":"view","type":"function"},{"inputs":[{"internalType":"address","name":"account","type":"address"}],"name":"includeInFee","outputs":[],"stateMutability":"nonpayable","type":"function"},{"inputs":[{"internalType":"address","name":"account","type":"address"}],"name":"includeInReward","outputs":[],"stateMutability":"nonpayable","type":"function"},{"inputs":[{"internalType":"address","name":"spender","type":"address"},{"internalType":"uint256","name":"addedValue","type":"uint256"}],"name":"increaseAllowance","outputs":[{"internalType":"bool","name":"","type":"bool"}],"stateMutability":"nonpayable","type":"function"},{"inputs":[{"internalType":"address","name":"account","type":"address"}],"name":"isExcludedFromFee","outputs":[{"internalType":"bool","name":"","type":"bool"}],"stateMutability":"view","type":"function"},{"inputs":[{"internalType":"address","name":"account","type":"address"}],"name":"isExcludedFromReward","outputs":[{"internalType":"bool","name":"","type":"bool"}],"stateMutability":"view","type":"function"},{"inputs":[{"internalType":"uint256","name":"time","type":"uint256"}],"name":"lock","outputs":[],"stateMutability":"nonpayable","type":"function"},{"inputs":[],"name":"name","outputs":[{"internalType":"string","name":"","type":"string"}],"stateMutability":"view","type":"function"},{"inputs":[],"name":"owner","outputs":[{"internalType":"address","name":"","type":"address"}],"stateMutability":"view","type":"function"},{"inputs":[{"internalType":"uint256","name":"tAmount","type":"uint256"},{"internalType":"bool","name":"deductTransferFee","type":"bool"}],"name":"reflectionFromToken","outputs":[{"internalType":"uint256","name":"","type":"uint256"}],"stateMutability":"view","type":"function"},{"inputs":[],"name":"renounceOwnership","outputs":[],"stateMutability":"nonpayable","type":"function"},{"inputs":[{"internalType":"address","name":"BurnWallet","type":"address"}],"name":"setBurnWallet","outputs":[],"stateMutability":"nonpayable","type":"function"},{"inputs":[{"internalType":"uint256","name":"liquidityFee","type":"uint256"}],"name":"setLiquidityFeePercent","outputs":[],"stateMutability":"nonpayable","type":"function"},{"inputs":[{"internalType":"uint256","name":"marketingFee","type":"uint256"}],"name":"setMarketingFeePercent","outputs":[],"stateMutability":"nonpayable","type":"function"},{"inputs":[{"internalType":"address","name":"MarketingWallet","type":"address"}],"name":"setMarketingWallet","outputs":[],"stateMutability":"nonpayable","type":"function"},{"inputs":[{"internalType":"uint256","name":"maxTxPercent","type":"uint256"}],"name":"setMaxTxPercent","outputs":[],"stateMutability":"nonpayable","type":"function"},{"inputs":[{"internalType":"bool","name":"_enabled","type":"bool"}],"name":"setSwapAndLiquifyEnabled","outputs":[],"stateMutability":"nonpayable","type":"function"},{"inputs":[{"internalType":"uint256","name":"taxFee","type":"uint256"}],"name":"setTaxFeePercent","outputs":[],"stateMutability":"nonpayable","type":"function"},{"inputs":[],"name":"swapAndLiquifyEnabled","outputs":[{"internalType":"bool","name":"","type":"bool"}],"stateMutability":"view","type":"function"},{"inputs":[],"name":"symbol","outputs":[{"internalType":"string","name":"","type":"string"}],"stateMutability":"view","type":"function"},{"inputs":[{"internalType":"uint256","name":"rAmount","type":"uint256"}],"name":"tokenFromReflection","outputs":[{"internalType":"uint256","name":"","type":"uint256"}],"stateMutability":"view","type":"function"},{"inputs":[],"name":"totalBurnFee","outputs":[{"internalType":"uint256","name":"","type":"uint256"}],"stateMutability":"view","type":"function"},{"inputs":[],"name":"totalFees","outputs":[{"internalType":"uint256","name":"","type":"uint256"}],"stateMutability":"view","type":"function"},{"inputs":[],"name":"totalSupply","outputs":[{"internalType":"uint256","name":"","type":"uint256"}],"stateMutability":"view","type":"function"},{"inputs":[{"internalType":"address","name":"recipient","type":"address"},{"internalType":"uint256","name":"amount","type":"uint256"}],"name":"transfer","outputs":[{"internalType":"bool","name":"","type":"bool"}],"stateMutability":"nonpayable","type":"function"},{"inputs":[{"internalType":"address","name":"sender","type":"address"},{"internalType":"address","name":"recipient","type":"address"},{"internalType":"uint256","name":"amount","type":"uint256"}],"name":"transferFrom","outputs":[{"internalType":"bool","name":"","type":"bool"}],"stateMutability":"nonpayable","type":"function"},{"inputs":[{"internalType":"address","name":"newOwner","type":"address"}],"name":"transferOwnership","outputs":[],"stateMutability":"nonpayable","type":"function"},{"inputs":[],"name":"uniswapV2Pair","outputs":[{"internalType":"address","name":"","type":"address"}],"stateMutability":"view","type":"function"},{"inputs":[],"name":"uniswapV2Router","outputs":[{"internalType":"contract IUniswapV2Router02","name":"","type":"address"}],"stateMutability":"view","type":"function"},{"inputs":[],"name":"unlock","outputs":[],"stateMutability":"nonpayable","type":"function"},{"inputs":[{"internalType":"address","name":"_newDexAddress","type":"address"}],"name":"updateDex","outputs":[],"stateMutability":"nonpayable","type":"function"},{"stateMutability":"payable","type":"receive"}], this.scan.contract);
      //   }
      // },

      // async setBurnAddress(address) {
      //   if(!this.walletConnected){
      //     this.connectWallet();
      //   }else{
      //     if(window.web3.utils.isAddress(address) == false){
      //       this.$root.showToast('Invalid address', 'is-danger');
      //       return;
      //     }

      //     this.web3.swap.methods.setBurnWallet(address).send({from: this.web3.account}).then(reponse => {
      //       this.$root.showToast('Burn address set to ' + address)
      //     }).catch(error => {
      //       this.$root.showToast(error.message, 'is-danger');
      //     });
      //   }
      // },
      async getScanTransfers(from, to) {
        // const web3 = new Web3(Web3.givenProvider);
        const web3 = new Web3(this.web3.provider);
        const SCAN = this.scan.contract;
        const scanabi = [{"inputs":[{"internalType":"address","name":"dexAddress","type":"address"},{"internalType":"address","name":"BurnWallet","type":"address"}],"stateMutability":"nonpayable","type":"constructor"},{"anonymous":false,"inputs":[{"indexed":true,"internalType":"address","name":"owner","type":"address"},{"indexed":true,"internalType":"address","name":"spender","type":"address"},{"indexed":false,"internalType":"uint256","name":"value","type":"uint256"}],"name":"Approval","type":"event"},{"anonymous":false,"inputs":[{"indexed":false,"internalType":"uint256","name":"minTokensBeforeSwap","type":"uint256"}],"name":"MinTokensBeforeSwapUpdated","type":"event"},{"anonymous":false,"inputs":[{"indexed":true,"internalType":"address","name":"previousOwner","type":"address"},{"indexed":true,"internalType":"address","name":"newOwner","type":"address"}],"name":"OwnershipTransferred","type":"event"},{"anonymous":false,"inputs":[{"indexed":false,"internalType":"uint256","name":"tokensSwapped","type":"uint256"},{"indexed":false,"internalType":"uint256","name":"ethReceived","type":"uint256"},{"indexed":false,"internalType":"uint256","name":"tokensIntoLiqudity","type":"uint256"}],"name":"SwapAndLiquify","type":"event"},{"anonymous":false,"inputs":[{"indexed":false,"internalType":"bool","name":"enabled","type":"bool"}],"name":"SwapAndLiquifyEnabledUpdated","type":"event"},{"anonymous":false,"inputs":[{"indexed":true,"internalType":"address","name":"from","type":"address"},{"indexed":true,"internalType":"address","name":"to","type":"address"},{"indexed":false,"internalType":"uint256","name":"value","type":"uint256"}],"name":"Transfer","type":"event"},{"inputs":[],"name":"_liquidityFee","outputs":[{"internalType":"uint256","name":"","type":"uint256"}],"stateMutability":"view","type":"function"},{"inputs":[],"name":"_maxTxAmount","outputs":[{"internalType":"uint256","name":"","type":"uint256"}],"stateMutability":"view","type":"function"},{"inputs":[],"name":"_taxFee","outputs":[{"internalType":"uint256","name":"","type":"uint256"}],"stateMutability":"view","type":"function"},{"inputs":[{"internalType":"address[]","name":"addresses","type":"address[]"},{"internalType":"uint256[]","name":"amounts","type":"uint256[]"}],"name":"airdrop","outputs":[],"stateMutability":"payable","type":"function"},{"inputs":[{"internalType":"address","name":"owner","type":"address"},{"internalType":"address","name":"spender","type":"address"}],"name":"allowance","outputs":[{"internalType":"uint256","name":"","type":"uint256"}],"stateMutability":"view","type":"function"},{"inputs":[{"internalType":"address","name":"spender","type":"address"},{"internalType":"uint256","name":"amount","type":"uint256"}],"name":"approve","outputs":[{"internalType":"bool","name":"","type":"bool"}],"stateMutability":"nonpayable","type":"function"},{"inputs":[{"internalType":"address","name":"account","type":"address"}],"name":"balanceOf","outputs":[{"internalType":"uint256","name":"","type":"uint256"}],"stateMutability":"view","type":"function"},{"inputs":[],"name":"decimals","outputs":[{"internalType":"uint8","name":"","type":"uint8"}],"stateMutability":"view","type":"function"},{"inputs":[{"internalType":"address","name":"spender","type":"address"},{"internalType":"uint256","name":"subtractedValue","type":"uint256"}],"name":"decreaseAllowance","outputs":[{"internalType":"bool","name":"","type":"bool"}],"stateMutability":"nonpayable","type":"function"},{"inputs":[{"internalType":"uint256","name":"tAmount","type":"uint256"}],"name":"deliver","outputs":[],"stateMutability":"nonpayable","type":"function"},{"inputs":[],"name":"disableWhitelistPermanently","outputs":[],"stateMutability":"nonpayable","type":"function"},{"inputs":[{"internalType":"address","name":"account","type":"address"}],"name":"excludeFromFee","outputs":[],"stateMutability":"nonpayable","type":"function"},{"inputs":[{"internalType":"address","name":"account","type":"address"}],"name":"excludeFromReward","outputs":[],"stateMutability":"nonpayable","type":"function"},{"inputs":[],"name":"geUnlockTime","outputs":[{"internalType":"uint256","name":"","type":"uint256"}],"stateMutability":"view","type":"function"},{"inputs":[],"name":"getBurnWallet","outputs":[{"internalType":"address","name":"","type":"address"}],"stateMutability":"view","type":"function"},{"inputs":[],"name":"getMarketingWallet","outputs":[{"internalType":"address","name":"","type":"address"}],"stateMutability":"view","type":"function"},{"inputs":[{"internalType":"address","name":"account","type":"address"}],"name":"includeInFee","outputs":[],"stateMutability":"nonpayable","type":"function"},{"inputs":[{"internalType":"address","name":"account","type":"address"}],"name":"includeInReward","outputs":[],"stateMutability":"nonpayable","type":"function"},{"inputs":[{"internalType":"address","name":"spender","type":"address"},{"internalType":"uint256","name":"addedValue","type":"uint256"}],"name":"increaseAllowance","outputs":[{"internalType":"bool","name":"","type":"bool"}],"stateMutability":"nonpayable","type":"function"},{"inputs":[{"internalType":"address","name":"account","type":"address"}],"name":"isExcludedFromFee","outputs":[{"internalType":"bool","name":"","type":"bool"}],"stateMutability":"view","type":"function"},{"inputs":[{"internalType":"address","name":"account","type":"address"}],"name":"isExcludedFromReward","outputs":[{"internalType":"bool","name":"","type":"bool"}],"stateMutability":"view","type":"function"},{"inputs":[{"internalType":"uint256","name":"time","type":"uint256"}],"name":"lock","outputs":[],"stateMutability":"nonpayable","type":"function"},{"inputs":[],"name":"name","outputs":[{"internalType":"string","name":"","type":"string"}],"stateMutability":"view","type":"function"},{"inputs":[],"name":"owner","outputs":[{"internalType":"address","name":"","type":"address"}],"stateMutability":"view","type":"function"},{"inputs":[{"internalType":"uint256","name":"tAmount","type":"uint256"},{"internalType":"bool","name":"deductTransferFee","type":"bool"}],"name":"reflectionFromToken","outputs":[{"internalType":"uint256","name":"","type":"uint256"}],"stateMutability":"view","type":"function"},{"inputs":[],"name":"renounceOwnership","outputs":[],"stateMutability":"nonpayable","type":"function"},{"inputs":[{"internalType":"address","name":"BurnWallet","type":"address"}],"name":"setBurnWallet","outputs":[],"stateMutability":"nonpayable","type":"function"},{"inputs":[{"internalType":"uint256","name":"liquidityFee","type":"uint256"}],"name":"setLiquidityFeePercent","outputs":[],"stateMutability":"nonpayable","type":"function"},{"inputs":[{"internalType":"uint256","name":"marketingFee","type":"uint256"}],"name":"setMarketingFeePercent","outputs":[],"stateMutability":"nonpayable","type":"function"},{"inputs":[{"internalType":"address","name":"MarketingWallet","type":"address"}],"name":"setMarketingWallet","outputs":[],"stateMutability":"nonpayable","type":"function"},{"inputs":[{"internalType":"uint256","name":"maxTxPercent","type":"uint256"}],"name":"setMaxTxPercent","outputs":[],"stateMutability":"nonpayable","type":"function"},{"inputs":[{"internalType":"bool","name":"_enabled","type":"bool"}],"name":"setSwapAndLiquifyEnabled","outputs":[],"stateMutability":"nonpayable","type":"function"},{"inputs":[{"internalType":"uint256","name":"taxFee","type":"uint256"}],"name":"setTaxFeePercent","outputs":[],"stateMutability":"nonpayable","type":"function"},{"inputs":[],"name":"swapAndLiquifyEnabled","outputs":[{"internalType":"bool","name":"","type":"bool"}],"stateMutability":"view","type":"function"},{"inputs":[],"name":"symbol","outputs":[{"internalType":"string","name":"","type":"string"}],"stateMutability":"view","type":"function"},{"inputs":[{"internalType":"uint256","name":"rAmount","type":"uint256"}],"name":"tokenFromReflection","outputs":[{"internalType":"uint256","name":"","type":"uint256"}],"stateMutability":"view","type":"function"},{"inputs":[],"name":"totalBurnFee","outputs":[{"internalType":"uint256","name":"","type":"uint256"}],"stateMutability":"view","type":"function"},{"inputs":[],"name":"totalFees","outputs":[{"internalType":"uint256","name":"","type":"uint256"}],"stateMutability":"view","type":"function"},{"inputs":[],"name":"totalSupply","outputs":[{"internalType":"uint256","name":"","type":"uint256"}],"stateMutability":"view","type":"function"},{"inputs":[{"internalType":"address","name":"recipient","type":"address"},{"internalType":"uint256","name":"amount","type":"uint256"}],"name":"transfer","outputs":[{"internalType":"bool","name":"","type":"bool"}],"stateMutability":"nonpayable","type":"function"},{"inputs":[{"internalType":"address","name":"sender","type":"address"},{"internalType":"address","name":"recipient","type":"address"},{"internalType":"uint256","name":"amount","type":"uint256"}],"name":"transferFrom","outputs":[{"internalType":"bool","name":"","type":"bool"}],"stateMutability":"nonpayable","type":"function"},{"inputs":[{"internalType":"address","name":"newOwner","type":"address"}],"name":"transferOwnership","outputs":[],"stateMutability":"nonpayable","type":"function"},{"inputs":[],"name":"uniswapV2Pair","outputs":[{"internalType":"address","name":"","type":"address"}],"stateMutability":"view","type":"function"},{"inputs":[],"name":"uniswapV2Router","outputs":[{"internalType":"contract IUniswapV2Router02","name":"","type":"address"}],"stateMutability":"view","type":"function"},{"inputs":[],"name":"unlock","outputs":[],"stateMutability":"nonpayable","type":"function"},{"inputs":[{"internalType":"address","name":"_newDexAddress","type":"address"}],"name":"updateDex","outputs":[],"stateMutability":"nonpayable","type":"function"},{"stateMutability":"payable","type":"receive"}]
        const SCAN_CONTRACT = new web3.eth.Contract(scanabi, SCAN);

        SCAN_CONTRACT.events.Transfer({
          fromBlock: from,
          toBlock: to,
        }, function(error, event){ console.log('EVENT', event); })
        .on('connected', str => console.log('CONNECTED', str))
        .on('data', function(event){
            console.log('DATA', event); // same results as the optional callback above
        })
        .on('changed', function(event){
            console.log('CHANGED', event); // remove event from local database
        })
        .on('error', console.error);
      },
      async getPastEvents() {
        // const web3 = new Web3(Web3.givenProvider);
        const web3 = new Web3(this.web3.provider);
        const SCAN = this.scan.contract;
        const scanabi = [{"inputs":[{"internalType":"address","name":"dexAddress","type":"address"},{"internalType":"address","name":"BurnWallet","type":"address"}],"stateMutability":"nonpayable","type":"constructor"},{"anonymous":false,"inputs":[{"indexed":true,"internalType":"address","name":"owner","type":"address"},{"indexed":true,"internalType":"address","name":"spender","type":"address"},{"indexed":false,"internalType":"uint256","name":"value","type":"uint256"}],"name":"Approval","type":"event"},{"anonymous":false,"inputs":[{"indexed":false,"internalType":"uint256","name":"minTokensBeforeSwap","type":"uint256"}],"name":"MinTokensBeforeSwapUpdated","type":"event"},{"anonymous":false,"inputs":[{"indexed":true,"internalType":"address","name":"previousOwner","type":"address"},{"indexed":true,"internalType":"address","name":"newOwner","type":"address"}],"name":"OwnershipTransferred","type":"event"},{"anonymous":false,"inputs":[{"indexed":false,"internalType":"uint256","name":"tokensSwapped","type":"uint256"},{"indexed":false,"internalType":"uint256","name":"ethReceived","type":"uint256"},{"indexed":false,"internalType":"uint256","name":"tokensIntoLiqudity","type":"uint256"}],"name":"SwapAndLiquify","type":"event"},{"anonymous":false,"inputs":[{"indexed":false,"internalType":"bool","name":"enabled","type":"bool"}],"name":"SwapAndLiquifyEnabledUpdated","type":"event"},{"anonymous":false,"inputs":[{"indexed":true,"internalType":"address","name":"from","type":"address"},{"indexed":true,"internalType":"address","name":"to","type":"address"},{"indexed":false,"internalType":"uint256","name":"value","type":"uint256"}],"name":"Transfer","type":"event"},{"inputs":[],"name":"_liquidityFee","outputs":[{"internalType":"uint256","name":"","type":"uint256"}],"stateMutability":"view","type":"function"},{"inputs":[],"name":"_maxTxAmount","outputs":[{"internalType":"uint256","name":"","type":"uint256"}],"stateMutability":"view","type":"function"},{"inputs":[],"name":"_taxFee","outputs":[{"internalType":"uint256","name":"","type":"uint256"}],"stateMutability":"view","type":"function"},{"inputs":[{"internalType":"address[]","name":"addresses","type":"address[]"},{"internalType":"uint256[]","name":"amounts","type":"uint256[]"}],"name":"airdrop","outputs":[],"stateMutability":"payable","type":"function"},{"inputs":[{"internalType":"address","name":"owner","type":"address"},{"internalType":"address","name":"spender","type":"address"}],"name":"allowance","outputs":[{"internalType":"uint256","name":"","type":"uint256"}],"stateMutability":"view","type":"function"},{"inputs":[{"internalType":"address","name":"spender","type":"address"},{"internalType":"uint256","name":"amount","type":"uint256"}],"name":"approve","outputs":[{"internalType":"bool","name":"","type":"bool"}],"stateMutability":"nonpayable","type":"function"},{"inputs":[{"internalType":"address","name":"account","type":"address"}],"name":"balanceOf","outputs":[{"internalType":"uint256","name":"","type":"uint256"}],"stateMutability":"view","type":"function"},{"inputs":[],"name":"decimals","outputs":[{"internalType":"uint8","name":"","type":"uint8"}],"stateMutability":"view","type":"function"},{"inputs":[{"internalType":"address","name":"spender","type":"address"},{"internalType":"uint256","name":"subtractedValue","type":"uint256"}],"name":"decreaseAllowance","outputs":[{"internalType":"bool","name":"","type":"bool"}],"stateMutability":"nonpayable","type":"function"},{"inputs":[{"internalType":"uint256","name":"tAmount","type":"uint256"}],"name":"deliver","outputs":[],"stateMutability":"nonpayable","type":"function"},{"inputs":[],"name":"disableWhitelistPermanently","outputs":[],"stateMutability":"nonpayable","type":"function"},{"inputs":[{"internalType":"address","name":"account","type":"address"}],"name":"excludeFromFee","outputs":[],"stateMutability":"nonpayable","type":"function"},{"inputs":[{"internalType":"address","name":"account","type":"address"}],"name":"excludeFromReward","outputs":[],"stateMutability":"nonpayable","type":"function"},{"inputs":[],"name":"geUnlockTime","outputs":[{"internalType":"uint256","name":"","type":"uint256"}],"stateMutability":"view","type":"function"},{"inputs":[],"name":"getBurnWallet","outputs":[{"internalType":"address","name":"","type":"address"}],"stateMutability":"view","type":"function"},{"inputs":[],"name":"getMarketingWallet","outputs":[{"internalType":"address","name":"","type":"address"}],"stateMutability":"view","type":"function"},{"inputs":[{"internalType":"address","name":"account","type":"address"}],"name":"includeInFee","outputs":[],"stateMutability":"nonpayable","type":"function"},{"inputs":[{"internalType":"address","name":"account","type":"address"}],"name":"includeInReward","outputs":[],"stateMutability":"nonpayable","type":"function"},{"inputs":[{"internalType":"address","name":"spender","type":"address"},{"internalType":"uint256","name":"addedValue","type":"uint256"}],"name":"increaseAllowance","outputs":[{"internalType":"bool","name":"","type":"bool"}],"stateMutability":"nonpayable","type":"function"},{"inputs":[{"internalType":"address","name":"account","type":"address"}],"name":"isExcludedFromFee","outputs":[{"internalType":"bool","name":"","type":"bool"}],"stateMutability":"view","type":"function"},{"inputs":[{"internalType":"address","name":"account","type":"address"}],"name":"isExcludedFromReward","outputs":[{"internalType":"bool","name":"","type":"bool"}],"stateMutability":"view","type":"function"},{"inputs":[{"internalType":"uint256","name":"time","type":"uint256"}],"name":"lock","outputs":[],"stateMutability":"nonpayable","type":"function"},{"inputs":[],"name":"name","outputs":[{"internalType":"string","name":"","type":"string"}],"stateMutability":"view","type":"function"},{"inputs":[],"name":"owner","outputs":[{"internalType":"address","name":"","type":"address"}],"stateMutability":"view","type":"function"},{"inputs":[{"internalType":"uint256","name":"tAmount","type":"uint256"},{"internalType":"bool","name":"deductTransferFee","type":"bool"}],"name":"reflectionFromToken","outputs":[{"internalType":"uint256","name":"","type":"uint256"}],"stateMutability":"view","type":"function"},{"inputs":[],"name":"renounceOwnership","outputs":[],"stateMutability":"nonpayable","type":"function"},{"inputs":[{"internalType":"address","name":"BurnWallet","type":"address"}],"name":"setBurnWallet","outputs":[],"stateMutability":"nonpayable","type":"function"},{"inputs":[{"internalType":"uint256","name":"liquidityFee","type":"uint256"}],"name":"setLiquidityFeePercent","outputs":[],"stateMutability":"nonpayable","type":"function"},{"inputs":[{"internalType":"uint256","name":"marketingFee","type":"uint256"}],"name":"setMarketingFeePercent","outputs":[],"stateMutability":"nonpayable","type":"function"},{"inputs":[{"internalType":"address","name":"MarketingWallet","type":"address"}],"name":"setMarketingWallet","outputs":[],"stateMutability":"nonpayable","type":"function"},{"inputs":[{"internalType":"uint256","name":"maxTxPercent","type":"uint256"}],"name":"setMaxTxPercent","outputs":[],"stateMutability":"nonpayable","type":"function"},{"inputs":[{"internalType":"bool","name":"_enabled","type":"bool"}],"name":"setSwapAndLiquifyEnabled","outputs":[],"stateMutability":"nonpayable","type":"function"},{"inputs":[{"internalType":"uint256","name":"taxFee","type":"uint256"}],"name":"setTaxFeePercent","outputs":[],"stateMutability":"nonpayable","type":"function"},{"inputs":[],"name":"swapAndLiquifyEnabled","outputs":[{"internalType":"bool","name":"","type":"bool"}],"stateMutability":"view","type":"function"},{"inputs":[],"name":"symbol","outputs":[{"internalType":"string","name":"","type":"string"}],"stateMutability":"view","type":"function"},{"inputs":[{"internalType":"uint256","name":"rAmount","type":"uint256"}],"name":"tokenFromReflection","outputs":[{"internalType":"uint256","name":"","type":"uint256"}],"stateMutability":"view","type":"function"},{"inputs":[],"name":"totalBurnFee","outputs":[{"internalType":"uint256","name":"","type":"uint256"}],"stateMutability":"view","type":"function"},{"inputs":[],"name":"totalFees","outputs":[{"internalType":"uint256","name":"","type":"uint256"}],"stateMutability":"view","type":"function"},{"inputs":[],"name":"totalSupply","outputs":[{"internalType":"uint256","name":"","type":"uint256"}],"stateMutability":"view","type":"function"},{"inputs":[{"internalType":"address","name":"recipient","type":"address"},{"internalType":"uint256","name":"amount","type":"uint256"}],"name":"transfer","outputs":[{"internalType":"bool","name":"","type":"bool"}],"stateMutability":"nonpayable","type":"function"},{"inputs":[{"internalType":"address","name":"sender","type":"address"},{"internalType":"address","name":"recipient","type":"address"},{"internalType":"uint256","name":"amount","type":"uint256"}],"name":"transferFrom","outputs":[{"internalType":"bool","name":"","type":"bool"}],"stateMutability":"nonpayable","type":"function"},{"inputs":[{"internalType":"address","name":"newOwner","type":"address"}],"name":"transferOwnership","outputs":[],"stateMutability":"nonpayable","type":"function"},{"inputs":[],"name":"uniswapV2Pair","outputs":[{"internalType":"address","name":"","type":"address"}],"stateMutability":"view","type":"function"},{"inputs":[],"name":"uniswapV2Router","outputs":[{"internalType":"contract IUniswapV2Router02","name":"","type":"address"}],"stateMutability":"view","type":"function"},{"inputs":[],"name":"unlock","outputs":[],"stateMutability":"nonpayable","type":"function"},{"inputs":[{"internalType":"address","name":"_newDexAddress","type":"address"}],"name":"updateDex","outputs":[],"stateMutability":"nonpayable","type":"function"},{"stateMutability":"payable","type":"receive"}]
        const SCAN_CONTRACT = new web3.eth.Contract(scanabi, SCAN);

        SCAN_CONTRACT.events.Transfer({
          filter: {
            value: [],
          },
          fromBlock: 11932907 // max 5000 blocks
        }, function(error, event){ console.log('EVENT', event); })
        .on('connected', str => console.log('CONNECTED', str))
        .on('data', function(event){
            console.log('DATA', event); // same results as the optional callback above
        })
        .on('changed', function(event){
            console.log('CHANGED', event); // remove event from local database
        })
        .on('error', console.error);
      },
      async listenEvents() {
        const WBNB = '0xbb4CdB9CBd36B01bD1cBaEBF2De08d9173bc095c';
        const wbnbabi = [{"constant":true,"inputs":[],"name":"name","outputs":[{"name":"","type":"string"}],"payable":false,"stateMutability":"view","type":"function"},{"constant":false,"inputs":[{"name":"guy","type":"address"},{"name":"wad","type":"uint256"}],"name":"approve","outputs":[{"name":"","type":"bool"}],"payable":false,"stateMutability":"nonpayable","type":"function"},{"constant":true,"inputs":[],"name":"totalSupply","outputs":[{"name":"","type":"uint256"}],"payable":false,"stateMutability":"view","type":"function"},{"constant":false,"inputs":[{"name":"src","type":"address"},{"name":"dst","type":"address"},{"name":"wad","type":"uint256"}],"name":"transferFrom","outputs":[{"name":"","type":"bool"}],"payable":false,"stateMutability":"nonpayable","type":"function"},{"constant":false,"inputs":[{"name":"wad","type":"uint256"}],"name":"withdraw","outputs":[],"payable":false,"stateMutability":"nonpayable","type":"function"},{"constant":true,"inputs":[],"name":"decimals","outputs":[{"name":"","type":"uint8"}],"payable":false,"stateMutability":"view","type":"function"},{"constant":true,"inputs":[{"name":"","type":"address"}],"name":"balanceOf","outputs":[{"name":"","type":"uint256"}],"payable":false,"stateMutability":"view","type":"function"},{"constant":true,"inputs":[],"name":"symbol","outputs":[{"name":"","type":"string"}],"payable":false,"stateMutability":"view","type":"function"},{"constant":false,"inputs":[{"name":"dst","type":"address"},{"name":"wad","type":"uint256"}],"name":"transfer","outputs":[{"name":"","type":"bool"}],"payable":false,"stateMutability":"nonpayable","type":"function"},{"constant":false,"inputs":[],"name":"deposit","outputs":[],"payable":true,"stateMutability":"payable","type":"function"},{"constant":true,"inputs":[{"name":"","type":"address"},{"name":"","type":"address"}],"name":"allowance","outputs":[{"name":"","type":"uint256"}],"payable":false,"stateMutability":"view","type":"function"},{"payable":true,"stateMutability":"payable","type":"fallback"},{"anonymous":false,"inputs":[{"indexed":true,"name":"src","type":"address"},{"indexed":true,"name":"guy","type":"address"},{"indexed":false,"name":"wad","type":"uint256"}],"name":"Approval","type":"event"},{"anonymous":false,"inputs":[{"indexed":true,"name":"src","type":"address"},{"indexed":true,"name":"dst","type":"address"},{"indexed":false,"name":"wad","type":"uint256"}],"name":"Transfer","type":"event"},{"anonymous":false,"inputs":[{"indexed":true,"name":"dst","type":"address"},{"indexed":false,"name":"wad","type":"uint256"}],"name":"Deposit","type":"event"},{"anonymous":false,"inputs":[{"indexed":true,"name":"src","type":"address"},{"indexed":false,"name":"wad","type":"uint256"}],"name":"Withdrawal","type":"event"}];
        const WBNB_CONTRACT = new web3.eth.Contract(wbnbabi, WBNB);

        WBNB_CONTRACT.events.allEvents({
          filter: {
            value: [],
          },
          fromBlock: 0
        }, function(error, event){ console.log(event); })
        .on('connected', str => console.log('CONNECTED', str))
        .on('data', function(event){
            console.log('DATA', event); // same results as the optional callback above
        })
        .on('changed', function(event){
            console.log('CHANGED', event); // remove event from local database
        })
        .on('error', console.error);
      },
      async pancakePriceToken(address, decimals, amount = 1) {
        const ROUTER_ADDRESS = '0x10ed43c718714eb63d5aa57b78b54704e256024e';

        const TOKEN = address ? address : this.scan.contract;      // TOKEN
        const WBNB = '0xbb4CdB9CBd36B01bD1cBaEBF2De08d9173bc095c'; // BNB
        const BUSD = '0xe9e7cea3dedca5984780bafc599bd69add087d56'; // BUSD

        const TOKEN_DECIMALS = decimals ? decimals : 9; // Decimals || scan decimlas.
        const BUSD_DECIMALS = 18; // Is common for almost all tokens, but can be any number.
        const BNB_DECIMALS = 18; // Is common for almost all tokens, but can be any number.
        amount = parseFloat(amount) * (10 ** TOKEN_DECIMALS);


        // const web3 = new Web3(Web3.givenProvider);
        const web3 = new Web3(this.web3.provider);

        // You can get the abi json from https://bscscan.com/address/0x10ed43c718714eb63d5aa57b78b54704e256024e#code
        const PANCAKE_V2_CONTRACT = new web3.eth.Contract(PANCAKE_V2_ABI, ROUTER_ADDRESS);

        /**
        * Call the getAmounsOut method from the router smart contract to return the price of 1 CAKE in BUSD.
        * The amount must be a string
        */
        const result= await PANCAKE_V2_CONTRACT.methods.getAmountsOut(amount+'', [TOKEN, WBNB, BUSD]).call();

        const BNB_PRICE = result[1] / (10 ** BNB_DECIMALS); // price of 1 TOKEN in BUSD [0 = TOKEN, 1 = WBNB, 2 = BUSD]
        const BUSD_PRICE = result[2] / (10 ** BUSD_DECIMALS); // price of 1 TOKEN in BUSD [0 = TOKEN, 1 = WBNB, 2 = BUSD]

        console.log(`${BNB_PRICE} BNB`);
        console.log(`${BUSD_PRICE} BUSD`);

        this.scan.price.bnb = BNB_PRICE;
        this.scan.price.busd = BUSD_PRICE;
      },
      async testPancakePriceToken(address, decimals) {
        const ROUTER_ADDRESS = '0x9ac64cc6e4415144c455bd8e4837fea55603e5c3'; // TEST ROUTER ADDRESS

        const TOKEN = address ? address : this.scan.test.token_address; // TOKEN
        const WBNB = '0xae13d989daC2f0dEbFf460aC112a837C89BAa7cd'; // BNB TESTNET

        const TOKEN_DECIMALS = decimals ? decimals : 18; // Decimals || scan test decimlas.
        const BNB_DECIMALS = 18; // Is common for almost all tokens, but can be any number.
        const amount = 1 * (10 ** TOKEN_DECIMALS );


        // const web3 = new Web3(Web3.givenProvider);
        const web3 = new Web3(this.web3.provider);

        // You can get the abi json from https://bscscan.com/address/0x9ac64cc6e4415144c455bd8e4837fea55603e5c3#code
        const abi = [{"inputs":[{"internalType":"uint256","name":"amountIn","type":"uint256"},{"internalType":"address[]","name":"path","type":"address[]"}],"name":"getAmountsOut","outputs":[{"internalType":"uint256[]","name":"amounts","type":"uint256[]"}],"stateMutability":"view","type":"function"},];
        const PANCAKE_V2_CONTRACT = new web3.eth.Contract(abi, ROUTER_ADDRESS);

        /**
        * Call the getAmounsOut method from the router smart contract to return the price of 1 CAKE in BUSD.
        * The amount must be a string
        */
        const result= await PANCAKE_V2_CONTRACT.methods.getAmountsOut(amount+'', [WBNB, TOKEN]).call();

        const BNB_PRICE = result[1] / (10 ** BNB_DECIMALS); // price of 1 TOKEN in BUSD [0 = TOKEN, 1 = WBNB, 2 = BUSD]

        console.log(`${BNB_PRICE} BNB`);

        this.scan.price.bnb = BNB_PRICE;
      },
      async amountsOutToken(amountsIn, tokenIn = 'BNB', tokenOut = 'SCAN', tokenInDecimals = 18, tokenOutDecimals = 9) {
        if(!amountsIn) throw 'Amount In required';

        const WBNB = this.bnbAddress;
        const TOKENIN = tokenIn === 'BNB' ? WBNB : (tokenIn === 'SCAN' ? this.scan.contract : tokenIn);
        const TOKENOUT = tokenOut === 'SCAN' ? this.scan.contract : (tokenOut === 'BNB' ? WBNB : tokenOut);
        const PATH = tokenIn === 'BNB' ? [WBNB, TOKENOUT] : (tokenOut === 'BNB' ? [TOKENIN, WBNB] : [TOKENIN, WBNB, TOKENOUT]);

        // const web3 = new Web3(Web3.givenProvider);
        const web3 = new Web3(this.web3.provider);

        const amount = new BigNumber(amountsIn.toString()).mul(new BigNumber(10).pow(tokenInDecimals)).toString(10);

        const PANCAKE_V2_CONTRACT = new web3.eth.Contract(PANCAKE_V2_ABI, this.pancakeswapV2RouterAddress);
        /* console.info('AMOUNT', amountsIn, amount, PATH, tokenIn, tokenOut, PANCAKE_V2_CONTRACT); */
        const result = await PANCAKE_V2_CONTRACT.methods.getAmountsOut(amount, PATH).call();

        if(tokenIn === 'BNB' && tokenOut === 'SCAN') this.scan.price.tokens_per_bnb = result[1] / (10 ** tokenOutDecimals);;
        // console.info(`Total ${tokenOut} for ${amountsIn} ${tokenIn}: ${result} ${tokenOut}`);

        return result;
      },
      async getAllowance(token, spender, wallet = null) {
        wallet = wallet ? wallet : this.wallet.address;
        if(!token || !wallet) return;
        token = token === 'BNB' ? this.bnbAddress : token;

        // let web3 = new Web3(Web3.givenProvider);
        let web3 = new Web3(this.web3.provider);
        let contract = new web3.eth.Contract(MINTOKENSABI, token);
        const result = await contract.methods.allowance(wallet, spender).call();
        return result;
      },
      async approve(token, spender, wallet = null) {
        wallet = wallet ? wallet : this.wallet.address;
        if(!token || !wallet) return;
        token = token === 'BNB' ? this.bnbAddress : token;

        const AMOUNT = '100000000000000000000000000000000';
        // let web3 = new Web3(Web3.givenProvider);
        let web3 = new Web3(this.web3.provider);
        let contract = new web3.eth.Contract(MINTOKENSABI, token);
        const result = await contract.methods.approve(spender, AMOUNT).send({ from: wallet });
        return result;
      },
      async balanceOf(token, wallet = null) {
        wallet = wallet ? wallet : this.wallet.address;
        if(!token || !wallet) return;

        // let web3 = new Web3(Web3.givenProvider);
        let web3 = new Web3(this.web3.provider);
        let contract = new web3.eth.Contract(MINTOKENSABI, token);
        let result = await contract.methods.balanceOf(wallet).call();
        return result;
      },
      async getSlippage(token) {
        return await axios.get(`/api/tokens/${token}/slippage`);
      },
      getTransactionsByBlock(from, to){
        console.info('TransactionsByBlock')
        axios.get(`/api/cov/tokens/${this.scan.contract}/events/${from}/${to}`).then(response => {
          let transfers = response.data.data.items.filter(o => {
            return o.decoded.name === 'Transfer' &&
                  o.decoded.params[0].value === '0xa9570d74ca22be5d91f46607f649c17bd3a5aae3'
//                   && [
// "0xcbc7c95fc91198d01ac81ff9af9465be8722dcc6","0xcfcf392ef9d9afa11024a822c9a90802f723fd22","0xc77046a96f03d879f3c6e86bab0ed17d5dd29b9c","0x1022dc7f5cd6330f348d53eb9cd84bb0144bb88d","0x94f22d081d1df7c45257f1e0c17fa769bf7234b3","0xd95bf8b59bd715f4d277f93f5eb10d1fab89f423","0xcd139f60e0db5608720a20dce030b9a5670af1ba","0x982727d82d70f436dd8953de85e4862bc993816d","0x0a89d12aa404135322c31bbe94f7d5b05f4cb9c7","0x5875b50b0434f84af40cff88954697716c104a44","0x696e06f276ea86f8882fa3315d6c89dbb899bc9e","0x684372a8a0e3ec78e7783418c8498a87ac30738a","0x4fe543987538a2e2167ee1b3cdaed8d71fe678f1","0xabb195eff939f6d733490f324682582c12f9e0dd","0xfd0b4c114dabd6ef165ab3916842ac3b86108ab5","0xcf3764ddf4fd9be48c4be640fe2b57c86d2a7608","0xcfb48e34c74f5d129a0c5b754336d195b91f73a1","0xbe892081f331ccf3fec5d1976ad10a14272401ab","0xf54ae4f26ee2192a29922c940377f33354169432","0xd4af563243035444ee126397993fc024251ca56e","0x8a49296e33df16833fd4b6e253b0137ba7d2c102","0x86e6a3deba5b4a847a171cca45b01daa31777be4","0x86beb519cf3757a5de9d3c8d3e1246c3664c09fe","0x3cbde5f149afb83db3a24a62ef940adbb53a62c4","0xcea80db88d8eef8b2e8cdd9c7f8ca569677c7145","0x6502dc66eb84fafa24ac4563ca6268dbec9bd77a","0x3db323c461e68aefca117770c3271083bc4317db","0xb42958c644d33bc62215cc45445c7136e01bcf17","0xa801c7630f109a1d0d0d6273d17a9f801f91f655","0x0d6f915b81171838e1ceb9dffe9ffef290069616","0xed3244ceba12911be27ac7c2d46da944cd545576","0x8c65c41de7a3588e8d93a8288c743212d48ef6be","0x57f8662d7fcdd7c1f2bc2241f329411c63e04bf8","0xb0f1657a6ff2e3b4fbde9e113b517810f9692fab","0xd65b707ad3ddf0b858a1d7f453772783497ff3ea","0x7e187b65f9a08f9a07503a17ba42279e46290606","0xc3324e9ca7b51a2109bc8a0f7575d465eab14307","0x6a1aa42d48edadab2d147a3b5a78c889c01eddc1","0x2402a20e6a3b40c5895c5cebd70aa56c9fca48a6","0x5ced75738ce98e5d15e6aca2f912b0991f383b9b","0xb9015efd48a31ef7bb17e2de1c4d514e3a76e9dc","0x9ad97ebccf0a841f1cc409f20518ebfb3cdf41d5","0xdbc71e7f041d3e06ff7b14b1ca3ee0e06ca268f8","0x3b12a61482f1a9f7dea876d2a139e4c0fd2316d9","0xc3c62657c29ad4a06f86bb26169ef183598714f6","0x1613e0a618c68f6acd9c70241dc4db41dd451c8c","0x0f33596248b76585f4df1e916e3d81a1aa29518f","0x10b3bb21380cfbbc8f1f476f06b8456346bf526a","0xe6497eef8762e53f988f911b76a5d51c32dddf93","0x06b5b0354f6caf1b1b67b090d9f95c3030c89286","0x8f81ffdf9508bbad50588aa3b3f67ae4a604146b","0x7e100c516939d452819daa78f155d8860463091f","0xcefe1e1a2d0b91781058143f747915a937f73291","0x3d8e20a57533475d72b7b31851df695be60f4221","0x3acfdb0123f0547624a6177180c0b4e921ae572b","0x34a5fec00c7a0a0aaad2e672f1e9d175fdd1c2a2","0xd7531fd1ca69f330fd6423a27c8dad257176f1ed","0x0edd80bf0828c161a371275a7f268fe7d0e5fea7","0xae7a32fe7324f298bd31a2bd529c6058509cf9f5","0x9b1e8562018f002148ec3c7eb7e50721eab0671f","0xff9b6fe202da85b11aa8c618ba722231b031021e","0x737691f96a83032b114001cce9576b744b8cdcea","0x3fd28155ac4519b09a56337a2c2321446b2fc4c5","0x8672b76f6bacb79f793d49cfffedf7fc67489284","0xe7817f8426b0de9123e20739105bbf7dc27c66f5","0x38ee2952ce564bc6f40490ca31f36d9cec1d536e","0x66aa55e3738ac40f576a4a7b71c5ed593b13b6a8","0xd31faed2ca8f688e7e1b695c8d9346b1acf7b873","0x5e037ff2e394bcb5c0b4fbef5ee05351ee47850e","0xa3660d8403d2c04e4f4384805eddcb5c15655441","0x27fa0469500ba9437c9ebeb984133987f2e95c02","0x3b150f0114054fa4e07f6437bad8ee7b83a25aed","0xe4767a42b15ff9b4d4fb524a51d87673807bb987","0x72c7c565d0d3caf354e43fb6ea7dbfed51ec185e","0x8de7785bc62a208e3488606b34f5f17333a0aca0","0x9991fb9c37c1f7debcb9c258b344dcbf0347e717","0xf3d0c89cdd924d64b24f28adfd142e7a6816772b","0x0197599dfa47c6c1d57ef027639f719883c39473","0x66e41cae81ee95d56da2d7d14164119e948bd64f","0x104cdb293b92ec4e2bf31d61c63272f7e18645b3","0xdb93e9542a8d8c1e479a737a85cbb3f30f7df4b5","0x36aaa162a0217e7df9961b07f857bf7c39f3013a","0x00baae879f7a4887f571cbb2012ad0ac1913ba93","0x8904c01c00ecf109e1aca2b5b6aeaf196fb63268","0xa25ba7b19fd745024f55919ace172a160460fd98","0x6f1be2b49e98b82b1f7aa6016643eb21c77c6579","0x2c2888f593d8a295b7faf94167c62c592da8ed4e","0xf78bcfa6b688d73f9bac032b38baf850aa1e7e51","0xea5de10367ed39e34f8402b9e7f15c8610d9bda2","0x95155bc96e475be96332436735e610d051bd8496","0xfbacd9533ea577867d3bdef606489e1bd6f83ce0","0x524d83039e2d82ece92a67f934ef73ac9ca7f007","0x7ba0f6e23dd0cdf7e3813936578b221fb0158315","0x4806f54ac521f02657bc54bc1a6c1031c70ad731","0x7a42ed908f0752e65da90ffd05e08f68da50683f","0xb718423ce9ed9bd3c314bb83969457fe46221ba4","0x4026fcaa5e2fb4fba0d68b59cb30508c3504b04c","0xa9be050243016418e4d13901efb77cbee819e3a7","0x1fc57d4e63e06ce6593a4fbb0f67c0f782df106f","0x34e422499b6c578474d3c4898792720d77e4570b","0xf2e4e1f80218426e9b36fca83499670ff508123e","0x3ef891a0524ab9da1109c4992ebe0402428b1792","0xceee8704050a833d544758e10f0cde786e919159","0xba7a485f2f1352c284a866ce2078f3e283b92f98","0xf61e50f19f60daf458cac3e1b8377552dd0324c2","0x6f84345a47dcef75deddb1a70e55e5b2b2b5b919","0x0b7d152974a43078ceb121ef03d27068d806122a","0x22c1b21d67c59a75b86e0d6d732544b33e18de28","0xf75e4066ce641bc9bb7c2e603c6e6751ae42d6af","0x6e52a60627b8e1cf89219886b1182c1f2bf54f6b","0x455044e09336b5a6d6d13658d63801be5db1eafe","0x3d7d98a3e0c0848f8e90afdc66e83be523d8e50f","0x209670e49fac5717ab5af8318e83e52365cd2ff4","0x9a50123b316c531fe1c09d0fea4809835dffdca5","0xcb4af74b4d3adab4a984be8f23282fd1e743ad58","0xe67c1029f1fccacc40afad4c8b68026a55e0fa37","0x0f4d73e1dd7a6e985540d3c44b402b869603ebc9","0xd6ae8398c34a87804b44cd7344708d5810b79316","0x1843bc998f5668d1ff092466cd581db4d29f703e","0x32344ed9a160829e13a9734b64dc2b1d83cb2b2b","0x892025ca3faae0ba2596405eefe33a022dbf6012","0x34ad698366f045328492143262cca949271d16ad","0x0ffd5e01404180f81326674c6fe87da70205a15e","0x42a93d77c7f04580d91faeb64d8aa1ff596d3c24","0x3acd28e7e679223a9e5c97d2c1c568ee8f7e7320","0x9d76eb975ba51a967982765248eb009f934b6eaa","0x1f56b7a11ed143a26c3e074e07126c9dbeb9b258","0x688312ba07264940871660d3dd84191d4b225c3b","0xc036839aa1563ce76a2f58329d3ecc277c62db81","0x8cab8f4739533fafafaa963e58355c7f2034b7f7","0x5cb1b004cff26dde07bc09b502bf451dce8cc520","0x6972314d4f222c1a435460ce9b11f874df7eb567","0xd1b1d7d62859cdd506ae62a31fbd9f11c66f380e","0xda0c257176e3f82d3e87ce2c6317198fdf37732b","0x90ad7a3c4f9f02d522806e5ecfb81a4e79590f89","0x14aa27c5b05346616e1f2359e3f72b07a2b2417b","0x53f2a5ffb49fa5c5a6265a0cfca5dc2657d7ee3f","0x1459a887f2d8401b45510b2c5bab6b950b8f2d21","0xf19664d2508193faa1883807f9ef530fcd9ae79b","0x5973bbebfe05fd000288a5fc4cd651a531600d56","0x11ad9695e0181432dafe7b5b9bf686a1c172adcc","0xa1a87de192a24a781df991959c6e1b0767f5f16c","0x436f3fb17dab0f61334952b3df3d3cd17f19612e","0xc10ee38e0049aea650ec0c9ba1def554268c4911","0xb1e1865e0877c6c6d0a344b57c8620ba47399084","0x0959d71d7b2281b11fb5158f712b262db3278307","0x9ac03aa39144d1566fb4340ecb46bdf3d1377e10","0x24577cd9eac36590b60849181597477ad1065832","0x236c1b8b3791a318a7860b721f094123b84ee66c","0xccca113bc41f47a9dfedf2c91fa8a6d1e79c16b4","0x2b7cff2d36f746ffdb9e7c2110f240b62cf1e66a","0xf2713a7dc8e6cd54d26658a1bc4192dfb899ce88","0xb8646e15c493370d2d9f9726cca5fa3d16a93479","0x9213a0c991094f9bc4c5fc6111b033e4d8b8f93d","0x4dba37e751707aeafcfc43379cc1704e3589fc6c","0xa26d646d8a124727632872bcd3987b086f74350e","0x776ae44bb6f2bd12c13d454d87136ba88af18c3e","0x64afbb0a9f0ea64e92168e1aff690681b69eafb2","0x59dc4bb3a7d3b7db18f26272c6f09b28c845f765","0x21dabe3de861cd0e78032982e4b345df5f269366","0x63a74838457dd917fb5ed87595cb96a00633486c","0x2244c6b95f54b5c9c085a71cb8afffc3a550d228","0x22577af28edf1ce93af5395801e6a67038f16c2c","0x06feb97ecfed1c087d8d272b0355d6d1c6bfd49a","0xe2476448bf5a6c61b00ba14ee8bf8728cc0fffb4","0xda3c90380050695a2344e6332ca82f07a824f251","0x761b0bf0dd69781056a2c9512bd830665084b4e4","0xe25b2cd8f8c7dfc3f6f7ebf5fa7b72c4c7572542","0x1f0c5c049f5318327d885d0f3d29ba7a0f1e17cf","0x4c51cfc6dc54af087e2d3eb334b8adfc07155830","0x80641a1c0f9ceb28976affd4a6d556be5cae2592","0xdf7bf90b82894113c2c55fc0f014472c6fb82058","0x2e3a39df901cb751f39b300b5bce118bdd113008","0xc74a5cf47de7973bcdef1551e77002d9c37fe91c","0xae0a23f1e93396b309d2090996f3b3f4cfe45813","0xf9f9a90bddb429c699b36bbf94b78be1fffc7eab","0x61e7f16c765ae146c3f5be73685b5ec085ca9799","0x03aede19dae187bb3a471ad4528fa8847237b5d6","0x667cec23ae0e3e546a9ef557610b8df186c8ca92","0x66b23b7093d1a790e6602487acac194b9c75f115","0x188bf54749b961dfbc89c0f4cce5088a1555755b","0xdd86e12384b17e6c6b199ddf9a77ea8fe4683089","0x37ab0eebe0c2d89344be3b73e63b0c1fc2151eb4","0x5819532e760b339a8bac573e823a111e5f4ad4fa","0xfe91d41bdd10bfbcb22f26e4a94849087f4b64be","0x2ca1ea137d88edc20afe1a330a69cd1fc3b3a46b","0x2e58a2c6c09d509a281f817d16a3468ba9a782f5","0x510243773de9daf812de5ff9fc9dea1a5a824a83","0x29c3d2ae7d20b999824f7faa50e7280279d03f7e","0xae4587b4f9a8809cc5210e596756f33f03fd2c1c","0x6be5bb20552cde0d795520d199eb672c98126592","0x493a50d25e32e66ddf4e283212518a6944f53d07","0x6211b80db2e27cee325a9ab4d45af6bfba0679b3","0x047e55561155642c350ba6541bbd203a141ad650","0x15bcc481697e37d5efed5f7c71f6fcb39c512aa3","0xe22f2f05f57efadfb2a97a45c581fd6700a83807","0x78c4ec9d832026dc91f8cb221f9369e80d682004","0x034ee9ba1e997b865e3245ab47926d4fc73ade1b","0x42a76a5dbb5c07c4d6956d91db5f3d343883c0ba","0x27148f9c1c607f1f0f9d4e77c11a5dc0dd72f5f4","0x8b5cc6f5c943bd08242b2aaae6eaad68f381dca1","0x10e9eabd353cdf03039c81655a29dade0bf70258","0xfd6db516d103df14fcde6df786d3ad485ab7bef6","0x90cd42922fef1639d05a5ad38899da6a7c27cf1d","0x226bb4316f71cf1c7168ea5e60276324b53de795","0x8a5ff91a8f079e3d205a5bc42daf2aa8c479d7de","0x645b336394fc997f4131badd150201401e56a317","0x26009778364de2197f936909400647438ed8c074","0x119223b73e52b6a20b9667ab7f512dc7bb319d08","0x5585b74e290e9ccc2b3f9efe3915e153572f20b5","0xd84702f024a09d0e336edc177311fdeaaf8d6beb","0x7ad3164510b861092b47b25faf21853312658ef4","0xfba01748b90978a78081d2d5d5e804e177224f5c","0xac0e0df29f3c0b1bca9a27447883f0136ac1a3ae","0x4e6fae908cc1d19d1617efee9dfa86f9484b0207"
//                   ].includes(o.decoded.params[1].value);
          });

          let transfersLite = transfers.map(o => {
            return {
              address: o.decoded.params[1].value,
              amount: this.formatTokenBalance(o.decoded.params[2].value, 9, 2)
            };
          });

          let transferReduced = [];

          transfersLite.reduce((accumulator, value) => {
            if(typeof transferReduced[value.address] === 'undefined') transferReduced[value.address] = parseFloat(value.amount);
            else transferReduced[value.address] += parseFloat(value.amount);
          });

          console.info(transferReduced);
        });
      },
      async tokenHoldersByBlock(token, block = 'latest') {
        console.info('tokenHoldersByBlock IN');
        await axios.get(`/api/cov/tokens/${token}/holders/${block}`).then(response => {
          let result = response.data.data.items.filter(o => o.balance > 0);
          console.info(result);
        });
        console.info('tokenHoldersByBlock OUT');
      },
// Fixed-point notation for number of SCAN which is divisible to 3 decimal places
financialScan(numScan){
    return Number.parseFloat(numScan / 1e18).toFixed(18);
},
async testTransaction() {
    // const web3 = new Web3(Web3.givenProvider);
    const web3 = new Web3(this.web3.provider);

    // This code was written and tested using web3 version 1.0.0-beta.29
    console.log(`web3 version: ${web3.version}`)
    // Who holds the token now?
    var myAddress = "0x1bA3a8E0e73cE52c37c0F8BD252b3c436ad18135";
    // Who are we trying to send this token to?
    var destAddress = "0x7729842323C2D0dA6b6F83edD355D23313F4c5D3";
    // Scan DeFi Test Token (SCAN) is divisible to 3 decimal places, 1 = 0.001 of SCAN
    var transferAmount = 1;
    // Determine the nonce
    var count = await web3.eth.getTransactionCount(myAddress);
    console.log(`num transactions so far: ${count}`);
    // Scan DeFi Test Token contract ABI Array
    var abiArray = this.scan.test.token_abi;
    // The address of the contract which created SCAN
    var contractAddress = this.scan.test.token_address;
    var contract = new web3.eth.Contract(abiArray, contractAddress);
    // How many tokens do I have before sending?
    var balance = await contract.methods.balanceOf(myAddress).call();
    console.log(`Balance before send: ${this.financialScan(balance)} SCAN\n------------------------`);
    // I chose gas price and gas limit based on what ethereum wallet was recommending for a similar transaction. You may need to change the gas price!
    // Use Gwei for the unit of gas price
    var gasPriceGwei = 3;
    var gasLimit = 3000000;
    // Chain ID of BSC Test Net is 97, replace it to 56 for Main Net
    var chainId = 97;
    var rawTransaction = {
        "from": myAddress,
        "nonce": "0x" + count.toString(16),
        "gasPrice": web3.utils.toHex(gasPriceGwei * 1e9),
        "gasLimit": web3.utils.toHex(gasLimit),
        "to": contractAddress,
        "value": "0x0",
        "data": contract.methods.transfer(destAddress, transferAmount).encodeABI(),
        "chainId": chainId
    };
    console.log(`Raw of Transaction: \n${JSON.stringify(rawTransaction, null, '\t')}\n------------------------`);
    // The private key for myAddress in .env
    var privKey = new Buffer(process.env.MIX_FARMING_PRIVATE_KEY, 'hex');
    var tx = new Tx(rawTransaction);
    tx.sign(privKey);
    var serializedTx = tx.serialize();
    // Comment out these four lines if you don't really want to send the TX right now
    console.log(`Attempting to send signed tx:  ${serializedTx.toString('hex')}\n------------------------`);
    var receipt = await web3.eth.sendSignedTransaction('0x' + serializedTx.toString('hex'));
    // The receipt info of transaction, Uncomment for debug
    console.log(`Receipt info: \n${JSON.stringify(receipt, null, '\t')}\n------------------------`);
    // The balance may not be updated yet, but let's check
    balance = await contract.methods.balanceOf(myAddress).call();
    console.log(`Balance after send: ${this.financialScan(balance)} SCAN`);
}
  },

  mounted() {
    let vue = this;

    console.info('AMOUNTS OUT 1BNB');
    vue.amountsOutToken(1);

    console.info('PANCAKE SCAN PRICE');
    vue.pancakePriceToken();

    // vue.tokenHoldersByBlock('0xccce542413528cb57b5761e061f4683a1247adcb', 12665320);

    // vue.getTransactionsByBlock(13825836, 13969661);

    jQuery(document).ready(function($) {
      $('[data-scrollto]').click(function(e) {
        e.stopPropagation();
        e.preventDefault();
        vue.scrollto(this.dataset.scrollto);
      });
    });

// let search = async (name) => {
//   let response = await fetch('https://bscscan.com/searchHandler?term=' + encodeURIComponent(name) + '&filterby=0');
//   response = await response.json();
//   return response
//     .map((item) => {
//       item = item.split("\t");
//       let data = item[2].split("~");
//       return {
//         name: item[0],
//         address: item[1],
//         contractAddres: data[0],
//         url: data[1],
//         price: data[3],
//         validate: item[4] != "0"
//       };
//     });
// }

// vue.token('cake');
// vue.token('bake');
// vue.token('helmet');
// vue.token('bdo');
// vue.token('sbdo');

// console.log(toChecksumAddress('0x90f8bf6a479f320ead074411a4b0e7944ea8c9c1'));


  },

  created() {
    let vue = this;
    vue.init();
  }

}).$mount('#app');