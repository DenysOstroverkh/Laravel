<template>
  <section class="scan-how-to-buy-section">

    <raised-bnb v-if="!modal"></raised-bnb>

    <section class="scan-how-container" :class="{'overflow-hidden':!step}">
      <img class="scan-circle-bg-image" src="/images/killcirclebg.png" srcset="/images/killcirclebg.png 1x, /images/killcirclebg@2x.png 2x" alt="Scan DeFi Circles BG">
      <img class="scan-money-bg-image" src="/images/killmoneybg.png" srcset="/images/killmoneybg.png 1x, /images/killmoneybg@2x.png 2x" alt="Scan DeFi coin BG">

      <div>
        <div class="scan-how-image-container">
          <img class="scan-image-money" src="/images/killblock.png" srcset="/images/killblock.png 1x, /images/killblock@2x.png 2x" alt="Scan DeFi coin">
        </div>

        <p class="presale-starts-title">{{countdownText}}</p>

        <vue-countdown-timer
          @start_callback="startCallBack('event started')"
          @end_callback="endCallBack('event ended')"
          :start-time="'2018-10-10 00:00:00'"
          :end-time="endtime"
          :interval="1000"
          :start-label="''"
          :end-label="''"
          label-position="begin"
          :end-text="''"
          :day-txt="'days'"
          :hour-txt="'hours'"
          :minutes-txt="'minutes'"
          :seconds-txt="'seconds'">
          <template slot="start-label" slot-scope="scope">
            <span style="color: red" v-if="scope.props.startLabel !== '' && scope.props.tips && scope.props.labelPosition === 'begin'">{{scope.props.startLabel}}:</span>
            <span style="color: blue" v-if="scope.props.endLabel !== '' && !scope.props.tips && scope.props.labelPosition === 'begin'">{{scope.props.endLabel}}:</span>
          </template>

          <template slot="countdown" slot-scope="scope">
            <div class="scan-countdown">
              <div class="scan-countdown-wrapper">
                <span class="scan-countdown-time">{{scope.props.days}}</span>
                <span class="scan-countdown-text">{{scope.props.dayTxt}}</span>
              </div>
              <div class="scan-countdown-wrapper">
                <span class="scan-countdown-time">{{scope.props.hours}}</span>
                <span class="scan-countdown-text">{{scope.props.hourTxt}}</span>
              </div>
              <div class="scan-countdown-wrapper">
                <span class="scan-countdown-time">{{scope.props.minutes}}</span>
                <span class="scan-countdown-text">{{scope.props.minutesTxt}}</span>
              </div>
              <div class="scan-countdown-wrapper">
                <span class="scan-countdown-time">{{scope.props.seconds}}</span>
                <span class="scan-countdown-text">{{scope.props.secondsTxt}}</span>
              </div>
            </div>
          </template>

          <template slot="end-label" slot-scope="scope">
            <span style="color: red" v-if="scope.props.startLabel !== '' && scope.props.tips && scope.props.labelPosition === 'end'">{{scope.props.startLabel}}:</span>
            <span style="color: blue" v-if="scope.props.endLabel !== '' && !scope.props.tips && scope.props.labelPosition === 'end'">{{scope.props.endLabel}}:</span>
          </template>

          <template slot="end-text" slot-scope="scope">
            <span style="color: green">{{ scope.props.endText}}</span>
          </template>
        </vue-countdown-timer>

        <div class="scan-how-buttons-container">
          <a class="button is-rounded is-outlined is-white" @click.prevent="setStep('free')">FREE TOKENS</a>
          <a class="button is-rounded is-outlined is-white" @click.prevent="setStep( 'buy')">HOW TO BUY</a>
          <a class="button is-rounded is-outlined is-white" @click.prevent="setStep('presale')">PRESALE</a>
        </div>
      </div>
    </section>

    <section class="scan-how-free scan-how-section" v-show="step === 'free'">
      <article class="scan-how-free-article">
        <p class="is-size-5 has-text-white has-text-centered m-b-20">JOIN ON BOARD</p>
        <div class="scan-hf-steps">
          <p class="scan-hf-step">You can participate in the 5% airdrop of the KILL GATES TOKEN supply:</p>
          <p class="scan-hf-step">1. Follow <a href="https://t.me/shitcoinopportunities" target="_blank">Shitcoin Opportunities</a> on their Telegram channel</p>
          <p class="scan-hf-step">2. Follow <a href="https://t.me/joinchat/7KiMYEWGo1Q5NDM0" target="_blank">KILL GATES TOKEN</a> on their Telegram channel.</p>
          <p class="scan-hf-step">3. Follow <a href="https://twitter.com/killgatestoken" target="_blank">@killgatestoken</a> on their Twitter channel.</p>
          <p class="scan-hf-step">4. Send your wallet to <a href="https://t.me/shitcoin_opportunities_support" target="_blank">@shitcoin_opportunities_support</a></p>
          <p class="scan-hf-step">5. Do it before the launch of KILL on its first exchange</p>
        </div>
      </article>

      <article class="scan-how-free-article">
        <p class="is-size-5 has-text-white has-text-centered m-b-20">FOR CONTENT CREATORS</p>
        <div class="scan-hf-steps">
          <p class="scan-hf-step">Steps to participate in the 3% airdrop of the KILL GATES TOKEN supply:</p>
          <p class="scan-hf-step">1. Follow <a href="https://t.me/shitcoinopportunities" target="_blank">Shitcoin Opportunities</a> on their Telegram channel.</p>
          <p class="scan-hf-step">2. Follow <a href="https://t.me/joinchat/7KiMYEWGo1Q5NDM0" target="_blank">KILL GATES TOKEN</a> on their Telegram channel.</p>
          <p class="scan-hf-step">3. Follow <a href="https://twitter.com/killgatestoken" target="_blank">@killgatestoken</a> on their Twitter channel.</p>
          <p class="scan-hf-step">4. Create a video on TIK TOK, INSTAGRAM or YOUTUBE telling some good things about KILL GATES TOKEN</p>
          <p class="scan-hf-step">5. Tag @shitcoinopportunities and @killgatestoken</p>
        </div>
      </article>
    </section>

    <section class="scan-how-buy scan-how-section" v-show="step === 'buy'">
      <!-- <article class="scan-how-buy-video">
        <youtube videoId="0J1zGVjHLHs" maxWidth="100%"></youtube>
      </article> -->

      <article class="scan-how-buy-steps scan-how-section">
        <article class="scan-ads m-t-0">
          <img class="scan-image-money-square" src="/images/killblock.png" srcset="/images/killblock.png 1x, /images/killblock@2x.png 2x" alt="Scan DeFi coin">
        </article>

        <p class="has-text-white m-b-15">Steps to buy KILL in Pancakeswap from step 1:</p>
        <p class="has-text-white m-b-15">Let's suppose you want to invest $1000 in KILL from Pancakeswap:</p>
        <p class="has-text-white m-b-15">For that you just have $1000 (in any cryptocurrency) + 0,1 BNB (that will be used to pay commissions)</p>

        <p class="has-text-white m-t-40 m-b-20"><strong class="has-text-white is-weight-900">STEP 1:</strong> Ceate a wallet (Metamask, Trust Wallet, Binance Chain wallet.... Etc)</p>

        <p class="has-text-white m-b-20"><strong class="has-text-white is-weight-900">STEP 2:</strong> Buy less than 0.1BNB (it's the minimum amount you can withdraw) in an exchange (Binance, Kucoin... Etc)</p>

        <p class="has-text-white m-b-20"><strong class="has-text-white is-weight-900">STEP 3:</strong> Send hour 0.1 BNB to your wallet from step 1 (you should do this through the network BEP 20 Binance Smart Chain, you should make sure that both the address and the network are the same)</p>

        <p class="has-text-white m-b-20"><strong class="has-text-white is-weight-900">STEP 4:</strong> When you get your 0.1BNB in your wallet you can invest in KILL connecting your wallet from step 1 with Pancakeswap in the top right corner (connect)</p>

        <p class="has-text-white m-b-20"><strong class="has-text-white is-weight-900">STEP 5:</strong> Now you should add the token to buy KILL and for that you should go to the exchange that Pancakeswap has and go into "add token"</p>

        <p class="has-text-white m-b-20"><strong class="has-text-white is-weight-900">STEP 6:</strong> Copy and paste the Token KILL and it will automatically appear</p>

        <p class="has-text-white m-b-20"><strong class="has-text-white is-weight-900">STEP 7:</strong> In another label it will say how many BNBs you have available in your wallet</p>

        <p class="has-text-white m-b-20"><strong class="has-text-white is-weight-900">STEP 8:</strong> Now you can swap your BNB for KILL</p>

        <p class="has-text-white m-b-20"><strong class="has-text-white is-weight-900">STEP 9:</strong> If it doesn't let you swap them, make sure you have the right slippage (normally with 12% will always work butwe recommend to try with less)</p>

        <p class="has-text-white m-b-20"><strong class="has-text-white is-weight-900">STEP 10:</strong> DONE, you will accept the contract that will appear at the right of the screen and once you pay the commission in BNB you can buy your KILL</p>

        <p class="has-text-centered has-text-white is-size-4 m-t-60">Now all that's left is to HODL!</p>

        <div class="scan-how-buy-image-container">
          <img class="scan-image-money" src="/images/killcirclebg.png" srcset="/images/killcirclebg.png 1x, /images/killcirclebg@2x.png 2x" alt="Scan DeFi coin">
        </div>
      </article>
    </section>

    <section class="scan-how-presale scan-how-section p-t-0" v-show="step === 'presale'">
      <section class="scan-how-presale-phases">
        <carousel ref="carousel"
          :items="1"
          :navText="['PREV PHASE', 'NEXT PHASE']"
          :rewind="false"
          class="m-b-100">
          <!-- :start-position="index" -->
          <div v-if="phase <= 1" class="scan-how-presale-phase">
            <presale-option type="is-primary" coin="BNB" coinqty="0.1" killqty="100,000,000" />
            <presale-option type="is-success" coin="BNB" coinqty="0.5" killqty="600,000,000" />
            <presale-option type="is-warning" coin="BNB" coinqty="1.0" killqty="1,400,000,000" />
            <p class="phase-text">PHASE 1</p>
          </div>
          <div v-if="phase <= 2" class="scan-how-presale-phase">
            <presale-option type="is-primary" coin="BNB" coinqty="0.1" killqty="92,000,000" />
            <presale-option type="is-success" coin="BNB" coinqty="0.5" killqty="552,000,000" />
            <presale-option type="is-warning" coin="BNB" coinqty="1.0" killqty="1,288,000,000" />
            <p class="phase-text">PHASE 2</p>
          </div>
          <div v-if="phase <= 3" class="scan-how-presale-phase">
            <presale-option type="is-primary" coin="BNB" coinqty="0.1" killqty="84,640,000" />
            <presale-option type="is-success" coin="BNB" coinqty="0.5" killqty="507,840,000" />
            <presale-option type="is-warning" coin="BNB" coinqty="1.0" killqty="1,184,960,000" />
            <p class="phase-text">PHASE 3</p>
          </div>
          <div v-if="phase <= 4" class="scan-how-presale-phase">
            <presale-option type="is-primary" coin="BNB" coinqty="0.1" killqty="77,868,800" />
            <presale-option type="is-success" coin="BNB" coinqty="0.5" killqty="467,212,800"/>
            <presale-option type="is-warning" coin="BNB" coinqty="1.0" killqty="1,090,163,200" />
            <p class="phase-text">PHASE 4</p>
          </div>
          <div v-if="phase <= 5" class="scan-how-presale-phase">
            <presale-option type="is-primary" coin="BNB" coinqty="0.1" killqty="71,639,296" />
            <presale-option type="is-success" coin="BNB" coinqty="0.5" killqty="429,835,776" />
            <presale-option type="is-warning" coin="BNB" coinqty="1.0" killqty="1,002,950,144" />
            <p class="phase-text">PHASE 5</p>
          </div>
          <div v-if="phase <= 6" class="scan-how-presale-phase">
            <presale-option type="is-primary" coin="BNB" coinqty="0.1" killqty="65,908,152" />
            <presale-option type="is-success" coin="BNB" coinqty="0.5" killqty="395,448,914" />
            <presale-option type="is-warning" coin="BNB" coinqty="1.0" killqty="922,714,132" />
            <p class="phase-text">PHASE 6</p>
                    </div>      "
          <div v-if="phase <= 7" class="scan-how-presale-phase">
            <presale-option type="is-primary" coin="BNB" coinqty="0.1" killqty="60,635,500" />
            <presale-option type="is-success" coin="BNB" coinqty="0.5" killqty="363,813,000" />
            <presale-option type="is-warning" coin="BNB" coinqty="1.0" killqty="848,897,001" />
            <p class="phase-text">PHASE 7</p>
          </div>
          <div v-if="phase <= 8" class="scan-how-presale-phase">
            <presale-option type="is-primary" coin="BNB" coinqty="0.1" killqty="55,784,660" />
            <presale-option type="is-success" coin="BNB" coinqty="0.5" killqty="334,707,960" />
            <presale-option type="is-warning" coin="BNB" coinqty="1.0" killqty="780,985,241" />
            <p class="phase-text">PHASE 8</p>
          </div>
          <div v-if="phase <= 9" class="scan-how-presale-phase">
            <presale-option type="is-primary" coin="BNB" coinqty="0.1" killqty="51,321,887" />
            <presale-option type="is-success" coin="BNB" coinqty="0.5" killqty="307,931,323" />
            <presale-option type="is-warning" coin="BNB" coinqty="1.0" killqty="718,506,422" />
            <p class="phase-text">PHASE 9</p>
          </div>
          <div v-if="phase <= 10" class="scan-how-presale-phase">
            <presale-option type="is-primary" coin="BNB" coinqty="0.1" killqty="47,216,136" />
            <presale-option type="is-success" coin="BNB" coinqty="0.5" killqty="283,296,818" />
            <presale-option type="is-warning" coin="BNB" coinqty="1.0" killqty="661,025,908" />
            <p class="phase-text">PHASE 10</p>
          </div>
          <div v-if="phase <= 11" class="scan-how-presale-phase">
            <presale-option type="is-primary" coin="BNB" coinqty="0.1" killqty="43,438,845" />
            <presale-option type="is-success" coin="BNB" coinqty="0.5" killqty="260,633,072" />
            <presale-option type="is-warning" coin="BNB" coinqty="1.0" killqty="608,143,835" />
            <p class="phase-text">PHASE 11</p>
          </div>
          <div v-if="phase <= 12" class="scan-how-presale-phase">
            <presale-option type="is-primary" coin="BNB" coinqty="0.1" killqty="39,963,737" />
            <presale-option type="is-success" coin="BNB" coinqty="0.5" killqty="239,782,426" />
            <presale-option type="is-warning" coin="BNB" coinqty="1.0" killqty="559,492,329" />
            <p class="phase-text">PHASE 12</p>
          </div>
          <div v-if="phase <= 13" class="scan-how-presale-phase">
            <presale-option type="is-primary" coin="BNB" coinqty="0.1" killqty="36,766,638" />
            <presale-option type="is-success" coin="BNB" coinqty="0.5" killqty="220,599,832" />
            <presale-option type="is-warning" coin="BNB" coinqty="1.0" killqty="514,732,942" />
            <p class="phase-text">PHASE 13</p>
          </div>
          <div v-if="phase <= 14" class="scan-how-presale-phase">
            <presale-option type="is-primary" coin="BNB" coinqty="0.1" killqty="33,825,307" />
            <presale-option type="is-success" coin="BNB" coinqty="0.5" killqty="202,951,846" />
            <presale-option type="is-warning" coin="BNB" coinqty="1.0" killqty="473,554,307" />
            <p class="phase-text">PHASE 14</p>
          </div>
          <div v-if="phase <= 15" class="scan-how-presale-phase">
            <presale-option type="is-primary" coin="BNB" coinqty="0.1" killqty="31,119,283" />
            <presale-option type="is-success" coin="BNB" coinqty="0.5" killqty="186,715,698" />
            <presale-option type="is-warning" coin="BNB" coinqty="1.0" killqty="435,669,963" />
            <p class="phase-text">PHASE 15</p>
          </div>
        </carousel>
      </section>

      <!-- <article class="scan-how-buy-video">
        <youtube videoId="15NXdhI2FhY" maxWidth="100%"></youtube>
      </article> -->

      <article id="howtopresale" class="scan-how-buy-steps scan-how-section p-t-0">
        <!-- <article class="scan-ads m-t-0"></article> -->

        <p class="has-text-white m-b-15">To participate in the pre-sale you need to follow these steps:</p>

        <p class="has-text-white m-t-40 m-b-20"><strong class="has-text-white is-weight-900">STEP 1:</strong> Send the desired BNB amount (0.1BNB, 0.5 BNB, 1BNB) to the direction down below</p>

        <copy-address :address="presaleAddress"></copy-address>

        <p class="has-text-white m-b-20 m-t-20"><strong class="has-text-white is-weight-900">STEP 2:</strong> We recommend sending a tiny bit more BNB to avoid us getting an inferior amount of BNB for the packet</p>

        <p class="has-text-white m-b-20"><strong class="has-text-white is-weight-900">STEP 3:</strong> Once you sent the BNB you should wait for us to do the transfer of your corresponding KILL. (This process can vary some days, but you will receive them before its launch in Pancakeswap)</p>

        <!-- <p class="has-text-centered has-text-white is-size-4 m-t-60">Now all that's left is to HODL!</p> -->

        <div class="scan-how-buy-image-container">
          <img class="scan-image-money" src="/images/killcirclebg.png" srcset="/images/killcirclebg.png 1x, /images/killcirclebg@2x.png 2x" alt="Scan DeFi coin">
        </div>
      </article>

      <article id="transactions" class="scan-how-buy-steps scan-how-section">
        <transaction-checker :address="$root.kill.addresses.presale"></transaction-checker>
      </article>
    </section>
  </section>
</template>

<script>
  export default {
    props: ['start', 'end', 'modal'],

    data() {
      return {
        step: null,
        youtube:{
          autoplay: 0,
        },
      }
    },

    watch: {
      step: {
        inmediate: true,
        deep: true,
        handler(val, oldVal) {
          // this.scrollBottom();
        }
      },
    },

    computed: {
      starttime() {
        return this.start || new Date();
      },
      endtimes() {
        return [
          '2021061012', '2021061112', '2021061212', '2021061312', '2021061412',
          '2021061512', '2021061612', '2021061712', '2021061812', '2021061912',
          '2021062012', '2021062112', '2021062212', '2021062312', '2021062412'
        ];
      },
      index() {
        let diff = moment().diff(moment('2021061012', 'YYYYMMDDHH'), 'days');
        return diff > 0 ? diff : 0;
      },
      phase() {
        return this.index + 1;
      },
      starttime() {
        return this.start || moment('2021061012', 'YYYYMMDDHH').toDate();
      },
      endtime() {
        let diff = moment().diff(moment('2021061012', 'YYYYMMDDHH'), 'days');
        let endday = diff > 0 ? 11 + diff : 11;
        return this.end || moment(`202106${endday}12`, 'YYYYMMDDHH').toDate();
      },
      presaleAddress() {
        return this.$root.kill.addresses.presale;
      },
      countdownText() {
        return `END OF PRESALE IN`;
      },
    },

    methods: {
      startCallBack: function(x) {
        console.log(x);
      },
      endCallBack: function(x) {
        console.log(x);
      },
      setStep(step) {
        this.step = step;
        this.scrollBottom();
      },
      scrollBottom() {
        if(this.modal) $('.modal-content').stop().animate({scrollTop: $('.modal-content').outerHeight() + 40}, 800);
        else $('html, body').stop().animate({scrollTop: $('.scan-how-container').outerHeight()}, 800);
      },
    },

    mounted() {
      console.info(this.modal);
    }
  }
</script>
