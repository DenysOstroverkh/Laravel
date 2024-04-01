<template>
  <section class="scan-modal-component web-report-modal-form-component">
    <div class="scan-modal">
      <header class="scan-modal-head" :class="{'has-step':hasStep, 'has-steps': hasSteps}">
        <span v-if="showPrevStep" class="modal-prev-step" :class="{'is-muted':disableActions}" @click.prevent="stepDown"></span>
        <span v-if="showNextStep" class="modal-next-step" :class="{'is-muted':disableActions}" @click.prevent="stepUp"></span>
        <span class="scan-modal-close" :class="{'is-muted':disableActions}" @click.prevent="$parent.close()"></span>
        <p class="scan-modal-title">{{title}}</p>
        <!-- <button type="button" class="delete" @click="$emit('close')"/> -->
      </header>
      <section class="scan-modal-body">
        <web-report-wallet-form ref="form" :wallet="wallet" @step="setStep" @type="setType" @reporting="setDisableActions" @close="$parent.close()" />
      </section>
      <!-- <footer class="scan-modal-foot">
        <button class="button is-dark" @click="$emit('close')">Close</button>
        <button class="button is-primary">Login</button>
      </footer> -->
    </div>
  </section>
</template>

<script>
  export default {
    props: {
      wallet: {
        type: Object,
        required: false,
        default: null,
      }
    },

    data() {
      return {
        step: null,
        type: null,
        showPrevStep: false,
        showNextStep: false,
        disableActions: false,
      }
    },

    computed: {
      title() {
        if(!this.step || this.step === 1) return 'Welcome to ScanDeFi Report';
        if(this.step === 2){
          if(this.type === 'wallet') return 'Report Wallet';
        }
        if(this.step === 3){
          if(this.type === 'wallet') return 'Report Wallet';
        }
        if(this.step === 4){
          if(this.type === 'wallet') return 'Report Wallet';
        }
        if(this.step === 5) return 'ScanDeFi Report';
      },
      hasStep() {
        return (this.showPrevStep && !this.showNextStep) || (!this.showPrevStep && this.showNextStep);
      },
      hasSteps() {
        return this.showPrevStep && this.showNextStep;
      },
    },

    methods: {
      setStep(data) {
        this.step = data.step;
        this.showPrevStep = data.showPrevStep;
        this.showNextStep = data.showNextStep;
      },
      setType(type) {
        this.type = type;
      },
      stepDown() {
        this.$refs.form.stepDown();
      },
      stepUp() {
        this.$refs.form.stepUp();
      },
      setDisableActions(bool) {
        this.disableActions = bool;
      },
    },

    mounted() {}
  }
</script>
