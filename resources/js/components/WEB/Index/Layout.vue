<template>
  <section class="scan-index-section">

    <section id="home" class="scan-welcome">
      <div class="scan-welcome-container">
        <div class="scan-welcome-text">
          <p class="scan-intro" data-aos="fade-left">Scan DeFi</p>
          <h1 class="has-text-white" data-aos="fade-left">{{trans('index.scammers_worst')}}<br/> {{trans('index.nightmare')}}.</h1>
          <p class="scan-desc" data-aos="fade-left" data-aos-delay="100">{{trans('index.description')}}</p>
          <div class="scan-welcome-icons">
            <div class="scan-rrss-icon">
              <a href="https://t.me/joinchat/7KiMYEWGo1Q5NDM0" target="_blank"><img class="scan-image-rrss" src="/images/telegram.svg" srcset="/images/telegram.svg 1x, /images/telegram.svg 2x" alt="Scan Telegram"></a>
            </div>
            <div class="scan-rrss-icon">
              <a href="https://twitter.com/ScanDefi" target="_blank"><img class="scan-image-rrss" src="/images/twitter.svg" srcset="/images/twitter.svg 1x, /images/twitter.svg 2x" alt="ScanDeFi Twitter"></a>
            </div>
            <div class="scan-rrss-icon">
              <a href="https://www.instagram.com/scan_defi" target="_blank"><img class="scan-image-rrss" src="/images/instagram.svg" srcset="/images/instagram.svg 1x, /images/instagram.svg 2x" alt="ScanDeFi Instagram"></a>
            </div>
          </div>
        </div>

        <div class="scan-image-money-container">
            <img class="scan-image-money" src="/images/index/png/WebScan.png" srcset="/images/index/png/WebScan.png 1x, /images/index/png/WebScan@2x.png 2x" alt="SCAN Web">
            <img class="scan-image-elipse" src="/images/index/png/Elipse.png" srcset="/images/index/png/Elipse.png 1x, /images/index/png/Elipse@2x.png 2x" alt="Elipse scan">
        </div>
      </div>
    </section>
      
    <section class="scan-ecosystem-container">
      <div class="scan-ecosystem-text">
        <div class="scan-ecosystem-text-title">
          <p>{{trans('index.ecosystem')}} <br/> {{trans('index.kill_scammers')}}</p>
        </div>
      </div>
      <div class="scan-ecosystem-data">
        <index-ecosystem></index-ecosystem>
      </div>
    </section>

    <section class="scan-more-info">
      <div class="scan-more-info-content">
        <div class="scan-more-info-content-title">
          <p class="scan-intro">Scan DeFi</p>
        </div>
        <div class="scan-more-info-content-title2">{{trans('index.control')}}</div>
        <div class="scan-more-info-content-contents">
          <div class="scan-more-info-content-contents-1" data-aos="fade-up">
            <div class="scan-more-info-content-contents-1-image">
              <img class="scan-image-elipse" src="/images/index/png/judge.png" srcset="/images/index/png/judge.png 1x, /images/index/png/judge@2x.png 2x" alt="Judge Scan">
            </div>
            <div class="scan-more-info-content-contents-1-title">
              <p>{{trans('index.fill_form')}}</p>
            </div>
            <div class="scan-more-info-content-contents-1-text">
              <p>{{trans('index.high_value')}}</p>
            </div>
          </div>
          <div class="scan-more-info-content-contents-1" data-aos="fade-up" data-aos-delay="100">
            <div class="scan-more-info-content-contents-1-image">
              <img class="scan-image-elipse" src="/images/index/png/heart.png" srcset="/images/index/png/heart.png 1x, /images/index/png/heart@2x.png 2x" alt="Heart Scan">
            </div>
            <div class="scan-more-info-content-contents-1-title">
              <p>{{trans('index.keep_safe')}}</p>
            </div>
            <div class="scan-more-info-content-contents-1-text">
              <p>{{trans('index.no_personal_data')}}</p>
            </div>            
          </div>
        </div>
      </div>
      <div class="scan-more-info-image" data-aos="fade-left" data-aos-delay="300">
        <img class="scan-more-info-img" src="/images/index/png/MovilScan.png" srcset="/images/index/png/MovilScan.png 1x, /images/index/png/MovilScan@2x.png 2x" alt="SCAN Web">
      </div>
    </section>

    <section class="scan-detailed-info">
      <div class="scan-detailed-info-title">
        <p class="has-text-white">{{trans('index.detailed')}}<br/> {{trans('index.information')}}</p>  
      </div>
      <div class="scan-detailed-info-cards">
        <div class="scan-detailed-info-card" data-aos="zoom-in" data-aos-duration="500" v-for="(report, index) in reports" :key="index">
          <index-coin class="info-card" :image="report.image" :top="report.top" :bottom="report.bottom" :comment="report.comment" :number="report.number" :reports="report.reports" :color="report.color" :barColor="report.barColor"></index-coin>
        </div>
      </div>
    </section>

    <section class="scan-tokenomics">
      <div class="scan-tokenomics-content">
        <div class="scan-tokenomics-content-image">
          <img class="scan-image-money" src="/images/scanmoney@x1.png" srcset="/images/scanmoney@x1.png 1x, /images/scanmoney@2x.png 2x" alt="Kill Gates money">
        </div>
        <div class="scan-tokenomics-content-text">
          <div class="scan-tokenomics-title">
            <p>{{trans('index.tokenomics').toUpperCase()}}</p>
          </div>
          <div data-aos="fade-left">
            <div class="scan-tokenomics-content-text-title">
              <p>SCAN DEFI $SCAN</p>
            </div>
            <div class="scan-tokenomics-content-text-paragraph">
              <p>{{trans('index.tokenomics_description')}}</p>
            </div>
            <div class="scan-tokenomics-content-text-buttons"> 
              <a href="/documents/Whitepaper_ScanDeFi_EN.pdf" class="button is-link is-normal m-t-10" target="_blank">White Paper EN</a>
              <a href="/documents/Whitepaper_ScanDeFi_ES.pdf" class="button is-link is-normal m-t-10" target="_blank">White Paper ES</a>
              <a href="/documents/Whitepaper_ScanDeFi_CN.pdf" class="button is-link is-normal m-t-10" target="_blank">White Paper CN</a>
            </div>
          </div>
        </div>
      </div>
      <div class="scan-tokenomics-card" data-aos="fade-up" data-aos-duration="500">
        <tokenomics-card></tokenomics-card>
      </div>
    </section>

    <section class="scan-roadmap">
      <div class="scan-roadmap-title">
        <p class="has-text-white">{{trans('index.roadmap')}}</p>
      </div>
      <div class="scan-roadmap-content">
        <div class="scan-roadmap-phrase" data-aos="fade-down">
          <p class="has-text-white">{{trans('index.story_beyond')}}</p>
        </div>
        <div class="scan-roadmap-image">
          <img src="/images/Roadmap@x1.png" srcset="/images/Roadmap@x1.png 1x, /images/Roadmap@x1.png 2x" alt="Roadmap SCAN">
        </div>
      </div>
    </section>

    <!-- <section class="scan-team">
      <div class="scan-team-title">
        <p class="has-text-white">Meet Our Team</p>
      </div>
      <div class="scan-team-phrase" data-aos="fade-down">
          <p class="has-text-white">"Our expertise will make you wise"</p>
      </div>
      <div class="scan-team-cards">
        <div data-aos="fade-down">
          <team-card class="scan-team-cards-item" name="?" work="Marketing Management" description="In this section you can use our KILL token to vote on important decisions."></team-card>
        </div>
        <div data-aos="fade-down" data-aos-delay="100">
          <team-card class="scan-team-cards-item" name="?" work="Web and Blockchain Development" description="In this section you can use our KILL token to vote on important decisions."></team-card>
        </div>
        <div data-aos="fade-down" data-aos-delay="200">
          <team-card class="scan-team-cards-item" name="?" work="Marketing Management" description="In this section you can use our KILL token to vote on important decisions."></team-card>
        </div>
        <div data-aos="fade-down">
          <team-card class="scan-team-cards-item" name="?" work="Web and Blockchain Development" description="In this section you can use our KILL token to vote on important decisions."></team-card>
        </div>
        <div data-aos="fade-down" data-aos-delay="100">
          <team-card class="scan-team-cards-item" name="?" work="Video Game Producer and Design" description="In this section you can use our KILL token to vote on important decisions."></team-card>
        </div>
        <div data-aos="fade-down" data-aos-delay="200">
          <team-card class="scan-team-cards-item" name="?" work="UI Designer" description="In this section you can use our KILL token to vote on important decisions."></team-card>
        </div>
        <div data-aos="fade-down">
          <team-card class="scan-team-cards-item" name="?" work="Social Media Marketing" description="In this section you can use our KILL token to vote on important decisions."></team-card>
        </div>
        <div data-aos="fade-down" data-aos-delay="100">
          <team-card class="scan-team-cards-item" name="?" work="Support and English" description="In this section you can use our KILL token to vote on important decisions."></team-card>
        </div>
        <div data-aos="fade-down" data-aos-delay="200">
          <team-card class="scan-team-cards-item" name="?" work="Video Game Programmer" description="In this section you can use our KILL token to vote on important decisions."></team-card>
        </div>
        <div data-aos="fade-down">
          <team-card class="scan-team-cards-item" name="?" work="Direction and Creation" description="In this section you can use our KILL token to vote on important decisions."></team-card>
        </div>
        
      </div>
    </section> -->

    <section class="scan-partners">
      <div class="scan-partners-title">
        <p class="has-text-white">{{choice('basic.partner', 2)}}</p>
      </div>
      <div class="scan-partners-images">
        <div class="scan-partners-images">
          <a :href="`https://pancakeswap.finance/swap?outputCurrency=${$root.scan.contract}`" target="_blank" data-aos="zoom-in">
            <img class="scan-partner-img" src="/images/partners/logos/pancake.png" srcset="/images/partners/logos/pancake.png 1x, /images/partners/logos/pancake@2x.png 2x" alt="PancakeSwap SCAN partner">
          </a>
          <a href="https://www.coingecko.com/es/monedas/scan-defi" target="_blank" data-aos="zoom-in">
            <img class="scan-partner-img" src="/images/partners/logos/coingecko-white.png" alt="Coingecko SCAN partner">
          </a>
          <a href="https://coinmarketcap.com/currencies/scan-defi/" target="_blank" data-aos="zoom-in">
            <img class="scan-partner-img" src="/images/partners/logos/coinmarketcap.svg" alt="CoinMarketCap SCAN partner">
          </a>

          <span style="flex-basis: 100%;height: 0;display: inline-block;"></span>

          <a href="https://youtu.be/qlBlPRFtxfs?t=491" target="_blank" data-aos="zoom-in" data-aos-delay="100">
            <img class="scan-partner-img is-vertical" src="/images/partners/logos/healthy-pockets.png" alt="Healthy Pockets SCAN partner" style="height:110px;">
          </a>
          <a href="https://www.youtube.com/channel/UC4-akFgu6Wb_IiQ9gsQvTHw" target="_blank" data-aos="zoom-in" data-aos-delay="200">
            <img class="scan-partner-img is-vertical" src="/images/partners/logos/buenos-dias-crypto.png" alt="Buenos días crypto SCAN partner" style="height:110px;">
          </a>
          <a href="https://www.youtube.com/channel/UCOxMq4HD0ybJbhAy4vUjIwA" target="_blank" data-aos="zoom-in" data-aos-delay="300">
            <img class="scan-partner-img is-vertical is-rounded" src="/images/partners/logos/levs.png" alt="Levs SCAN partner" style="height: 100px;">
          </a>
          <a href="https://linktr.ee/armycripto" target="_blank" data-aos="zoom-in" data-aos-delay="400">
            <img class="scan-partner-img is-vertical" src="/images/partners/logos/army-crypto.png" alt="Army Crypto SCAN partner">
          </a>
          <a href="https://trifasickotrading.com" target="_blank" data-aos="zoom-in" data-aos-delay="500">
            <img class="scan-partner-img is-vertical" src="/images/partners/logos/trifasicko.png" alt="Trifasicko Trading SCAN partner" style="height: 80px;">
          </a>
          <a href="https://linktr.ee/whitetrader" target="_blank" data-aos="zoom-in" data-aos-delay="600">
            <img class="scan-partner-img is-vertical" src="/images/partners/logos/white-trader.png" alt="White Trader SCAN partner">
          </a>
          <a href="https://www.instagram.com/cryptosmartglobal" target="_blank" data-aos="zoom-in" data-aos-delay="700">
            <img class="scan-partner-img is-vertical" src="/images/partners/logos/crypto-smart-global.png" alt="Crypto Smart Global SCAN partner">
          </a>
          <a href="https://www.youtube.com/c/CriptoPositivoMasivo" target="_blank" data-aos="zoom-in" data-aos-delay="800">
            <img class="scan-partner-img is-vertical" src="/images/partners/logos/cripto-positivo-masivo.png" alt="Cripto Positivo Masivo SCAN partner" style="height:100px;">
          </a>
          <a href="https://ultrasafe.finance" target="_blank" data-aos="zoom-in" data-aos-delay="900">
            <img class="scan-partner-img is-vertical" src="/images/partners/logos/ultrasafe.png" alt="Ultrasafe SCAN partner" style="height:110px;">
          </a>
          <a href="https://www.youtube.com/c/CryptoAlterno/featured" target="_blank" data-aos="zoom-in" data-aos-delay="1000">
            <img class="scan-partner-img is-vertical" src="/images/partners/logos/crypto-alterno.png" alt="Ctypto Alterno SCAN partner" style="height:110px;">
          </a>
          <a href="https://www.youtube.com/c/DineroTonto/featured" target="_blank" data-aos="zoom-in" data-aos-delay="1100">
            <img class="scan-partner-img is-vertical" src="/images/partners/logos/dinero-tonto.png" alt="Dinero Tonto SCAN partner" style="height:110px;">
          </a>
          <a href="https://linktr.ee/Tradingcryptovzla" target="_blank" data-aos="zoom-in" data-aos-delay="1200">
            <img class="scan-partner-img is-vertical" src="/images/partners/logos/trading-crypto-vzla.png" alt="Trading Crypto Vzla SCAN partner" style="height:110px;">
          </a>
          <a href="https://youtu.be/4BgJCyBaBhs" target="_blank" data-aos="zoom-in" data-aos-delay="1300">
            <img class="scan-partner-img is-vertical" src="/images/partners/logos/beorus.png" alt="Beorus SCAN partner" style="height:110px;">
          </a>
          <a href="https://t.me/SilverStonksEN" target="_blank" data-aos="zoom-in" data-aos-delay="1400">
            <img class="scan-partner-img is-vertical" src="/images/partners/logos/silver-stonks.png" alt="Silver Stonks SCAN partner" style="height:110px;">
          </a>
          <a href="https://www.d-reit.finance" target="_blank" data-aos="zoom-in" data-aos-delay="1500">
            <img class="scan-partner-img is-vertical" src="/images/partners/logos/d-reit.png" alt="D-Reit SCAN partner" style="height:110px;">
          </a>
          <a href="https://www.instagram.com/cripto.allstar" target="_blank" data-aos="zoom-in" data-aos-delay="1600">
            <img class="scan-partner-img is-vertical" src="/images/partners/logos/cripto-allstar.png" alt="Cripto Allstar SCAN partner" style="height:110px;">
          </a>
          <a href="https://www.instagram.com/junglacrypto" target="_blank" data-aos="zoom-in" data-aos-delay="1700">
            <img class="scan-partner-img is-vertical" src="/images/partners/logos/jungla-crypto.png" alt="Jungla Crypto SCAN partner" style="height:110px;">
          </a>
          <a href="https://twitter.com/LeviathanCrypto" target="_blank" data-aos="zoom-in" data-aos-delay="1800">
            <img class="scan-partner-img is-vertical" src="/images/partners/logos/crypto-leviathan.png" alt="Crypto Leviathan SCAN partner" style="height:110px;">
          </a>
          <a href="https://youtube.com/channel/UC31HbSgRAyzsiteQwzMEXiA" target="_blank" data-aos="zoom-in" data-aos-delay="1900">
            <img class="scan-partner-img is-vertical" src="/images/partners/logos/gamers-crypto.png" alt="Gamer$ Crypto SCAN partner" style="height:110px;">
          </a>
          <a href="https://youtube.com/c/LaOlaCripto" target="_blank" data-aos="zoom-in" data-aos-delay="2000">
            <img class="scan-partner-img is-vertical" src="/images/partners/logos/la-ola-cripto.png" alt="La Ola Cripto SCAN partner" style="height:110px;">
          </a>
          <a href="https://beasties.online/" target="_blank" data-aos="zoom-in" data-aos-delay="2100">
            <img class="scan-partner-img is-vertical" src="/images/partners/logos/magic-beasties.png" alt="Magic Beasties SCAN partner" style="height:110px;">
          </a>
          <!-- <a href="#" target="_blank" data-aos="zoom-in" data-aos-delay="2200">
            <img class="scan-partner-img is-vertical" src="/images/partners/logos/crypto-flow.png" alt="Crypto Flow SCAN partner" style="height:110px;">
          </a> -->
          <a href="https://instagram.com/cryptoholics_" target="_blank" data-aos="zoom-in" data-aos-delay="2200">
            <img class="scan-partner-img is-vertical" src="/images/partners/logos/crypto-holycs.png" alt="Crypto Holycs SCAN partner" style="height:110px;">
          </a>
          <a href="https://youtube.com/channel/UCb7Sa2YwGVAPP9jcsci4Bsw" target="_blank" data-aos="zoom-in" data-aos-delay="2300">
            <img class="scan-partner-img is-vertical" src="/images/partners/logos/vivir-invirtiendo.png" alt="Vivir Invirtiendo SCAN partner" style="height:110px;">
          </a>
          <a href="https://instagram.com/miami_token" target="_blank" data-aos="zoom-in" data-aos-delay="2300">
            <img class="scan-partner-img is-vertical" src="/images/partners/logos/miami-token.png" alt="Miami Token SCAN partner" style="height:110px;">
          </a>
          <a href="https://youtube.com/c/ComunidadCRIPTO" target="_blank" data-aos="zoom-in" data-aos-delay="2300">
            <img class="scan-partner-img is-vertical" src="/images/partners/logos/comunidad-cripto.png" alt="Comunidad Cripto SCAN partner" style="height:110px;">
          </a>
          <a href="https://www.youtube.com/watch?v=STcGoQJS9Co" target="_blank" data-aos="zoom-in" data-aos-delay="2400">
            <img class="scan-partner-img is-vertical" src="/images/partners/logos/criptoniano.png" alt="Criptoniano SCAN partner" style="height:110px;">
          </a>
          <a href="https://www.instagram.com/crypto_aprendiz/" target="_blank" data-aos="zoom-in" data-aos-delay="2400">
            <img class="scan-partner-img is-vertical" src="/images/partners/logos/crypto_aprendiz.png" alt="Crypto Aprendiz SCAN partner" style="height:110px;">
          </a>
          <a href="https://criptops.com/" target="_blank" data-aos="zoom-in" data-aos-delay="2500">
            <img class="scan-partner-img is-vertical" src="/images/partners/logos/criptops.png" alt="Criptops SCAN partner" style="height:110px;">
          </a>
          <a href="https://www.youtube.com/watch?v=Sb0ulKovMS8" target="_blank" data-aos="zoom-in" data-aos-delay="2500">
            <img class="scan-partner-img is-vertical" src="/images/partners/logos/crypto_orell.png" alt="Crypto Orell SCAN partner" style="height:110px;">
          </a>
          <a href="https://www.youtube.com/watch?v=rGl4GVCGwd8" target="_blank" data-aos="zoom-in" data-aos-delay="2600">
            <img class="scan-partner-img is-vertical" src="/images/partners/logos/drop_coin.png" alt="Drop Coin SCAN partner" style="height:110px;">
          </a>
          <a href="https://www.instagram.com/exeterstudentinvestmentfund/" target="_blank" data-aos="zoom-in" data-aos-delay="2600">
            <img class="scan-partner-img is-vertical" src="/images/partners/logos/exsif.png" alt="Exsif SCAN partner" style="height:110px;">
          </a>
          <a href="https://intereconomia.com/directo/" target="_blank" data-aos="zoom-in" data-aos-delay="2700">
            <img class="scan-partner-img is-vertical" src="/images/partners/logos/intereconomia.png" alt="Intereconomia SCAN partner" style="height:110px;">
          </a>
          <a href="https://lemonnetwork.sale/" target="_blank" data-aos="zoom-in" data-aos-delay="2700">
            <img class="scan-partner-img is-vertical" src="/images/partners/logos/lemon-network.png" alt="Lemon Network SCAN partner" style="height:110px;">
          </a>
          <a href="https://www.youtube.com/channel/UCMlWujx6OI-M_Y01OP7BgSg/videos" target="_blank" data-aos="zoom-in" data-aos-delay="2800">
            <img class="scan-partner-img is-vertical" src="/images/partners/logos/crypto-costa.png" alt="Crypto Costa SCAN partner" style="height:110px;">
          </a>
          <a href="https://www.youtube.com/c/EntrepreneurInspiration/videos" target="_blank" data-aos="zoom-in" data-aos-delay="2800">
            <img class="scan-partner-img is-vertical" src="/images/partners/logos/crypto-inspiration.png" alt="Crypto Inspiration SCAN partner" style="height:110px;">
          </a>
          <a href="https://dfsocial.com/" target="_blank" data-aos="zoom-in" data-aos-delay="2900">
            <img class="scan-partner-img is-vertical" src="/images/partners/logos/dfsocial.png" alt="DFSocial SCAN partner" style="height:110px;">
          </a>
          <a href="https://www.youtube.com/c/QuieroGanarOficial/videos" target="_blank" data-aos="zoom-in" data-aos-delay="2900">
            <img class="scan-partner-img is-vertical" src="/images/partners/logos/quiero-ganar.png" alt="Quiero ganar SCAN partner" style="height:110px;">
          </a>
          <a href="https://www.youtube.com/c/CryptoBoyOfficial" target="_blank" data-aos="zoom-in" data-aos-delay="3000">
            <img class="scan-partner-img is-vertical" src="/images/partners/logos/crypto-boy.png" alt="Crypto Boy SCAN partner" style="height:110px;">
          </a>
          <a href="https://www.youtube.com/c/SatoshiFactory/videos" target="_blank" data-aos="zoom-in" data-aos-delay="3000">
            <img class="scan-partner-img is-vertical" src="/images/partners/logos/satoshi-factory.png" alt="Satoshi Factory SCAN partner" style="height:110px;">
          </a>
          <a href="https://www.instagram.com/uonbes/" target="_blank" data-aos="zoom-in" data-aos-delay="3000">
            <img class="scan-partner-img is-vertical" src="/images/partners/logos/bes.png" alt="Uonbes SCAN partner" style="height:110px;">
          </a>
          <a href="https://www.instagram.com/btradingmedia/" target="_blank" data-aos="zoom-in" data-aos-delay="3000">
            <img class="scan-partner-img is-vertical" src="/images/partners/logos/btrading.png" alt="BTrading SCAN partner" style="height:110px;">
          </a>
        </div>
      </div>
    </section>
  </section>
</template>

<script>
  export default {
    props: {},

    data() {
      return {
        reports: [
          { top: "The Cosby Token", bottom: "COSBY", comment: "Low circulating supply", reports: 60, number: 5, image: "images/index/nuevasindexcoins/teamvitalyfan.png", color: "#2ECC71", barColor: "is-success"},
          { top: "Baby Shiba Vitality", bottom: "BABYVIT", comment: "You can't sell the token", reports: 10467, number: 90, image: "images/index/nuevasindexcoins/indexcoin6@2x.png", color: "#E74C3C", barColor: "is-danger" },
          { top: "Support Doge Price", bottom: "SUPD", comment: "Technical errors in the website", reports: 123, number: 10, image: "images/index/indexcoins/Imagen187@2x.png", color: "#2ecc71", barColor: "is-success" },
          { top: "Stardoge Token", bottom: "SDOGE", comment: "The market is controlled by a few wallets", reports: 347, number: 15, image: "images/index/indexcoins/Recurso41@2x.png", color: "#3498DB", barColor: "is-info" },
          { top: "Wish Shiba Dragon", bottom: "WISHSHIB", comment: "They are impersonating someone they are not", reports: 1209, number: 45, image: "images/index/nuevasindexcoins/indexcoin2@2x.png", color: "#F1C40F", barColor: "is-warning" },
          { top: "Shiba Finance", bottom: "SHIBF", comment: "Token created to pump and dump", reports: 1818, number: 50, image: "images/index/indexcoins/Imagen189@2x.png", color: "#F1C40F", barColor: "is-warning" },
          { top: "Baby Cat Token", bottom: "BCAT", comment: "Doesn't answer questions in social networks", reports: 678, number: 25, image: "images/index/nuevasindexcoins/indexcoin3@2x.png", color: "#3498DB", barColor: "is-info" },
          { top: "Binancer Economy", bottom: "BNBE", comment: "Token created to pump and dump", reports: 2178, number: 60, image: "images/index/indexcoins/Recurso81@2x.png", color: "#F1C40F", barColor: "is-warning" },
          { top: "Starship Token", bottom: "STAR", comment: "Doesn't have a whitepaper", reports: 4673, number: 70, image: "images/index/indexcoins/Imagen191@2x.png", color: "#F1C40F", barColor: "is-warning" },
          { top: "Moon Coin", bottom: "MNC", comment: "Doesn't have an official website", reports: 934, number: 35, image: "images/index/nuevasindexcoins/indexcoin4@2x.png", color: "#3498DB", barColor: "is-info" },
          { top: "Cathot.Finance", bottom: "CATHOT", comment: "Doesn't have a project", reports: 6578, number: 80, image: "images/index/nuevasindexcoins/indexcoin5@2x.png", color: "#E74C3C", barColor: "is-danger" },
          { top: "Baby Dragon Fan", bottom: "BDRAG", comment: "The team is unknown", reports: 7, number: 2, image: "images/index/indexcoins/Imagen184@2x.png", color: "#2ecc71", barColor: "is-success" },
        ]
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

    methods: {},

    mounted() {}
  }
</script>