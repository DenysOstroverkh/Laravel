<template>
  <section class="web-marketplace-component">
    <section class="marketplace-carousel-container">
      <slick class="marketplace-carousel" ref="carousel" :options="slick.options">
        <!-- <div class="marketplace-sponsor">
          <a href=""><img class="marketplace-sponsor-image" src="/images/marketplace-test-slider.png" alt="Buy Scan DeFi token"></a>
          <div class="marketplace-sponsor-foot">
            <p>Our first sponsor tomorrow will be in the next few days to prepare your marketing</p>
          </div>
        </div> -->
        <div class="marketplace-sponsor is-placeholder">
          <a href=""><img class="marketplace-sponsor-image" src="https://via.placeholder.com/750x325/131726/FFFFFF?text=?" alt="Buy Scan DeFi token"></a>
          <div class="marketplace-sponsor-foot">
            <p>{{trans('index.marketing')}}</p>
          </div>
        </div>
        <div class="marketplace-sponsor is-placeholder">
          <a href=""><img class="marketplace-sponsor-image" src="https://via.placeholder.com/750x325/131726/FFFFFF?text=?" alt="Buy Scan DeFi token"></a>
          <div class="marketplace-sponsor-foot">
            <p>{{trans('index.marketing')}}</p>
          </div>
        </div>
        <div class="marketplace-sponsor is-placeholder">
          <a href=""><img class="marketplace-sponsor-image" src="https://via.placeholder.com/750x325/131726/FFFFFF?text=?" alt="Buy Scan DeFi token"></a>
          <div class="marketplace-sponsor-foot">
            <p>{{trans('index.marketing')}}</p>
          </div>
        </div>
        <div class="marketplace-sponsor is-placeholder">
          <a href=""><img class="marketplace-sponsor-image" src="https://via.placeholder.com/750x325/131726/FFFFFF?text=?" alt="Buy Scan DeFi token"></a>
          <div class="marketplace-sponsor-foot">
            <p>{{trans('index.marketing')}}</p>
          </div>
        </div>
      </slick>
    </section>

    <h1 class="marketplace-title">{{trans('index.no_commision')}} 🎊</h1>
    <p class="marketplace-description">{{trans('index.no_commision_offer')}}</p>

    <section class="marketplace-options">
      <web-marketplace-card name="octopus" :id="1" :swap="swap" class="marketplace-option" />
      <web-marketplace-card name="shark" :id="2" :swap="swap" class="marketplace-option" />
      <web-marketplace-card name="whale" :id="3" :swap="swap" class="marketplace-option" />

      <!-- <article class="marketplace-option">
        <div class="marketplace-option-head">
          <p class="marketplace-option-title">Octopus</p>
        </div>
        <div class="marketplace-option-content">
          <div class="marketplace-option-offer-container">
            <p class="marketplace-option-offer">7,150.00 SCAN</p>
            <div class="marketplace-option-offer-tokens">
              <img class="marketplace-token-image is-scan" src="/images/logos/logo.svg" alt="Scan DeFi token logo">
              <img class="marketplace-token-image" src="/images/tokens/bnb.svg" alt="Binance Coin token logo">
            </div>
            <div class="marketplace-option-bid-container">
              <p class="marketplace-option-bid">0.5 BNB</p>
            </div>
          </div>
          <p class="is-size-7 m-t-4"><i class="fas fa-exclamation-circle m-r-3"></i> The price will be updated every 5 minutes</p>

          <div class="marketplace-option-info-container">
            <div class="marketplace-option-info-line">
              <div class="option-info-left">Buy starts in:</div>
              <div class="option-info-right">
                <span class="time">08</span>
                <span class="text">hours</span>
                <span class="time">04</span>
                <span class="text">mins</span>
                <span class="time">06</span>
                <span class="text">sec</span>
              </div>
            </div>
            <div class="marketplace-option-info-line">
              <div class="option-info-left">Total tokens offered:</div>
              <div class="option-info-right">1,000,000.00 SCAN</div>
            </div>
            <div class="marketplace-option-info-line">
              <div class="option-info-left">Participants:</div>
              <div class="option-info-right">268</div>
            </div>
            <div class="marketplace-option-info-line">
              <div class="option-info-left">Tokens available:</div>
              <div class="option-info-right">123,321.78 SCAN</div>
            </div>
          </div>

          <div class="marketplace-option-foot">
            <button class="button is-fullwidth is-primary is-medium m-t-25" @click="$root.notifyWorkingOnIt()">BUY SCAN</button>
          </div>
        </div>
      </article>
      <article class="marketplace-option">
        <div class="marketplace-option-head">
          <p class="marketplace-option-title">Shark</p>
        </div>
        <div class="marketplace-option-content">
          <div class="marketplace-option-offer-container">
            <p class="marketplace-option-offer">14,174.00 SCAN</p>
            <div class="marketplace-option-offer-tokens">
              <img class="marketplace-token-image is-scan" src="/images/logos/logo.svg" alt="Scan DeFi token logo">
              <img class="marketplace-token-image" src="/images/tokens/bnb.svg" alt="Binance Coin token logo">
            </div>
            <div class="marketplace-option-bid-container">
              <p class="marketplace-option-bid">1.00 BNB</p>
            </div>
          </div>
          <p class="is-size-7 m-t-4"><i class="fas fa-exclamation-circle m-r-3"></i> The price will be updated every 5 minutes</p>

          <div class="marketplace-option-info-container">
            <div class="marketplace-option-info-line">
              <div class="option-info-left">Buy starts in:</div>
              <div class="option-info-right">
                <span class="time">08</span>
                <span class="text">hours</span>
                <span class="time">04</span>
                <span class="text">mins</span>
                <span class="time">06</span>
                <span class="text">sec</span>
              </div>
            </div>
            <div class="marketplace-option-info-line">
              <div class="option-info-left">Total tokens offered:</div>
              <div class="option-info-right">2,000,000.00 SCAN</div>
            </div>
            <div class="marketplace-option-info-line">
              <div class="option-info-left">Participants:</div>
              <div class="option-info-right">268</div>
            </div>
            <div class="marketplace-option-info-line">
              <div class="option-info-left">Tokens available:</div>
              <div class="option-info-right">193,508.78 SCAN</div>
            </div>
          </div>

          <div class="marketplace-option-foot">
            <button class="button is-fullwidth is-primary is-medium m-t-25" @click="$root.notifyWorkingOnIt()">BUY SCAN</button>
          </div>
        </div>
      </article>
      <article class="marketplace-option">
        <div class="marketplace-option-head">
          <p class="marketplace-option-title">Whale</p>
        </div>
        <div class="marketplace-option-content">
          <div class="marketplace-option-offer-container">
            <p class="marketplace-option-offer">46,594.40 SCAN</p>
            <div class="marketplace-option-offer-tokens">
              <img class="marketplace-token-image is-scan" src="/images/logos/logo.svg" alt="Scan DeFi token logo">
              <img class="marketplace-token-image" src="/images/tokens/bnb.svg" alt="Binance Coin token logo">
            </div>
            <div class="marketplace-option-bid-container">
              <p class="marketplace-option-bid">2.00 BNB</p>
            </div>
          </div>
          <p class="is-size-7 m-t-4"><i class="fas fa-exclamation-circle m-r-3"></i> The price will be updated every 5 minutes</p>

          <div class="marketplace-option-info-container">
            <div class="marketplace-option-info-line">
              <div class="option-info-left">Buy starts in:</div>
              <div class="option-info-right">
                <span class="time">08</span>
                <span class="text">hours</span>
                <span class="time">04</span>
                <span class="text">mins</span>
                <span class="time">06</span>
                <span class="text">sec</span>
              </div>
            </div>
            <div class="marketplace-option-info-line">
              <div class="option-info-left">Total tokens offered:</div>
              <div class="option-info-right">3,000,000.00 SCAN</div>
            </div>
            <div class="marketplace-option-info-line">
              <div class="option-info-left">Participants:</div>
              <div class="option-info-right">268</div>
            </div>
            <div class="marketplace-option-info-line">
              <div class="option-info-left">Tokens available:</div>
              <div class="option-info-right">106,766.09 SCAN</div>
            </div>
          </div>

          <div class="marketplace-option-foot">
            <button class="button is-fullwidth is-primary is-medium m-t-25" @click="$root.notifyWorkingOnIt()">BUY SCAN</button>
          </div>
        </div>
      </article> -->
    </section>
  </section>
</template>

<script>
  export default {
    props: {},

    data() {
      return {
        slick: {
          options: {
            slidesToShow: 3,
            loop: true,
            autoplay: true,
            autoplaySpeed: 2000,
            dots: false,
            arrows: false,
            responsive: [
              {
                breakpoint: 1250,
                settings: {
                  slidesToShow: 2,
                },
              },
              {
                breakpoint: 768,
                settings: {
                  slidesToShow: 1,
                },
              },
            ],
          },
        },
        swap: {
          address: '0x022Ae9Be815d1d35f0ae40462ABcc652c5f83e08',
          abi: [{"inputs":[{"internalType":"address","name":"_router","type":"address"},{"internalType":"address","name":"_wallet","type":"address"}],"stateMutability":"nonpayable","type":"constructor"},{"anonymous":false,"inputs":[{"indexed":true,"internalType":"address","name":"previousOwner","type":"address"},{"indexed":true,"internalType":"address","name":"newOwner","type":"address"}],"name":"OwnershipTransferred","type":"event"},{"anonymous":false,"inputs":[{"indexed":false,"internalType":"address","name":"account","type":"address"}],"name":"Paused","type":"event"},{"anonymous":false,"inputs":[{"indexed":false,"internalType":"address","name":"account","type":"address"}],"name":"Unpaused","type":"event"},{"inputs":[{"internalType":"uint256","name":"","type":"uint256"}],"name":"_packs","outputs":[{"internalType":"string","name":"promotionName","type":"string"},{"internalType":"address","name":"tokenIn","type":"address"},{"internalType":"uint256","name":"rewardRate","type":"uint256"},{"internalType":"uint256","name":"lockTime","type":"uint256"},{"internalType":"uint256","name":"promotionAmount","type":"uint256"},{"internalType":"uint256","name":"usedAmount","type":"uint256"},{"internalType":"uint256","name":"startTime","type":"uint256"},{"internalType":"uint256","name":"endTime","type":"uint256"},{"internalType":"uint256","name":"minAmount","type":"uint256"},{"internalType":"uint256","name":"maxAmount","type":"uint256"},{"internalType":"uint256","name":"participants","type":"uint256"}],"stateMutability":"view","type":"function"},{"inputs":[{"internalType":"uint256","name":"_packID","type":"uint256"},{"internalType":"uint256","name":"amount","type":"uint256"}],"name":"addPackFunds","outputs":[],"stateMutability":"nonpayable","type":"function"},{"inputs":[{"internalType":"uint256","name":"_packID","type":"uint256"}],"name":"buyPackWithBNB","outputs":[],"stateMutability":"payable","type":"function"},{"inputs":[{"internalType":"uint256","name":"_packID","type":"uint256"},{"internalType":"uint256","name":"_amount","type":"uint256"}],"name":"buyPackWithToken","outputs":[],"stateMutability":"nonpayable","type":"function"},{"inputs":[{"internalType":"uint256","name":"_amount","type":"uint256"},{"internalType":"uint256","name":"_rewardRate","type":"uint256"}],"name":"calculateRewards","outputs":[{"internalType":"uint256","name":"","type":"uint256"}],"stateMutability":"pure","type":"function"},{"inputs":[{"internalType":"uint256[]","name":"_vaultIDs","type":"uint256[]"}],"name":"claimRewardVaults","outputs":[],"stateMutability":"nonpayable","type":"function"},{"inputs":[{"internalType":"uint256","name":"_packID","type":"uint256"}],"name":"closePack","outputs":[],"stateMutability":"nonpayable","type":"function"},{"inputs":[{"internalType":"string","name":"promotionName","type":"string"},{"internalType":"address","name":"tokenIn","type":"address"},{"internalType":"uint256","name":"rewardRate","type":"uint256"},{"internalType":"uint256","name":"lockTime","type":"uint256"},{"internalType":"uint256","name":"promotionAmount","type":"uint256"},{"internalType":"uint256","name":"startTime","type":"uint256"},{"internalType":"uint256","name":"endTime","type":"uint256"},{"internalType":"uint256","name":"minAmount","type":"uint256"},{"internalType":"uint256","name":"maxAmount","type":"uint256"},{"internalType":"address[]","name":"path","type":"address[]"}],"name":"createPack","outputs":[],"stateMutability":"nonpayable","type":"function"},{"inputs":[{"internalType":"address","name":"_holder","type":"address"}],"name":"getAllVaultsByHolder","outputs":[{"internalType":"uint256[]","name":"","type":"uint256[]"},{"internalType":"uint256[]","name":"","type":"uint256[]"},{"internalType":"uint256[]","name":"","type":"uint256[]"}],"stateMutability":"view","type":"function"},{"inputs":[{"internalType":"uint256","name":"_amount","type":"uint256"},{"internalType":"address[]","name":"path","type":"address[]"}],"name":"getAmountOut","outputs":[{"internalType":"uint256","name":"","type":"uint256"}],"stateMutability":"view","type":"function"},{"inputs":[{"internalType":"uint256","name":"amount","type":"uint256"}],"name":"getCompensation","outputs":[{"internalType":"uint256","name":"","type":"uint256"}],"stateMutability":"pure","type":"function"},{"inputs":[{"internalType":"address","name":"_holder","type":"address"}],"name":"getHolderVaultAmount","outputs":[{"internalType":"uint256","name":"","type":"uint256"}],"stateMutability":"view","type":"function"},{"inputs":[{"internalType":"address","name":"_holder","type":"address"},{"internalType":"uint256","name":"_index","type":"uint256"}],"name":"getHolderVaultIDAtIndex","outputs":[{"internalType":"uint256","name":"","type":"uint256"}],"stateMutability":"view","type":"function"},{"inputs":[{"internalType":"uint256","name":"_packID","type":"uint256"}],"name":"getPack","outputs":[{"internalType":"uint256","name":"","type":"uint256"},{"internalType":"uint256","name":"","type":"uint256"},{"internalType":"uint256","name":"","type":"uint256"},{"internalType":"uint256","name":"","type":"uint256"},{"internalType":"uint256","name":"","type":"uint256"}],"stateMutability":"view","type":"function"},{"inputs":[{"internalType":"uint256","name":"_packID","type":"uint256"}],"name":"getPackTotalAmount","outputs":[{"internalType":"uint256","name":"","type":"uint256"}],"stateMutability":"view","type":"function"},{"inputs":[],"name":"getPacks","outputs":[{"internalType":"uint256[]","name":"","type":"uint256[]"},{"internalType":"uint256[]","name":"","type":"uint256[]"},{"internalType":"uint256[]","name":"","type":"uint256[]"},{"internalType":"uint256[]","name":"","type":"uint256[]"},{"internalType":"uint256[]","name":"","type":"uint256[]"}],"stateMutability":"view","type":"function"},{"inputs":[{"internalType":"uint256","name":"_vaultID","type":"uint256"}],"name":"getVaultByID","outputs":[{"components":[{"internalType":"uint256","name":"amount","type":"uint256"},{"internalType":"uint256","name":"unlockTime","type":"uint256"}],"internalType":"struct Vault.Lock","name":"","type":"tuple"}],"stateMutability":"view","type":"function"},{"inputs":[{"internalType":"uint256","name":"","type":"uint256"}],"name":"globalPath","outputs":[{"internalType":"address","name":"","type":"address"}],"stateMutability":"view","type":"function"},{"inputs":[],"name":"owner","outputs":[{"internalType":"address","name":"","type":"address"}],"stateMutability":"view","type":"function"},{"inputs":[],"name":"pause","outputs":[],"stateMutability":"nonpayable","type":"function"},{"inputs":[],"name":"paused","outputs":[{"internalType":"bool","name":"","type":"bool"}],"stateMutability":"view","type":"function"},{"inputs":[],"name":"renounceOwnership","outputs":[],"stateMutability":"nonpayable","type":"function"},{"inputs":[{"internalType":"address","name":"newOwner","type":"address"}],"name":"transferOwnership","outputs":[],"stateMutability":"nonpayable","type":"function"},{"inputs":[],"name":"unPause","outputs":[],"stateMutability":"nonpayable","type":"function"},{"inputs":[],"name":"wallet","outputs":[{"internalType":"address","name":"","type":"address"}],"stateMutability":"view","type":"function"}],
          packs: [],
        },
        loading: {
          packs: false,
        }
      }
    },

    watch: {
      data: {
        inmediate: true,
        deep: true,
        handler(val, oldVal) {
          //do something
        }
      },
    },

    computed: {},

    methods: {
      init() {
        this.$root.amountsOutToken(1);
        this.setPancakePriceInterval();
        // this.getPacks();
      },
      // async getPacks() {
      //   this.loading.packs = true;
      //   const web3 = new Web3(Web3.givenProvider);
      //   const SWAP_CONTRACT = new web3.eth.Contract(this.swap.abi, this.swap.address);
      //   const result = await SWAP_CONTRACT.methods.getPacks().call().then(result =>{
      //     let packs = Object.values(result);
      //     console.info(packs);
      //     packs = [packs[0], packs[1], packs[2], packs[3], packs[4]].reduce((a, b) => a.map((e,i) => [e,b[i]].flat()));
      //     console.info(packs);
      //     this.swap.packs = packs;
      //   }).catch(error => console.info(error));
      // },
      setPancakePriceInterval() {
        let vue = this;
        setInterval(function() {
          vue.$root.amountsOutToken(1);
        }, (1000 * 60));
      },
    },

    mounted() {
      this.init();
    }
  }
</script>
