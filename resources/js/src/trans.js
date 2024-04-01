module.exports = {
  methods: {
    // Tracude la clave dada
    trans(key, replace = {}) {
      let translation = key;
      try{ translation = key.split('.').reduce((t, i) => t[i] || null, this.$root.translations).split('|')[0] }
      catch(e){ return key }

      for(let placeholder in replace) translation = translation.replace(`:${placeholder}`, replace[placeholder]);

      return translation;
    },

    // Traduce la clave dada y singulariza o pluraliza
    choice(key, count = 1, replace = {}) {
      let translation = key;
      try{ translation = key.split('.').reduce((t, i) => t[i] || null, this.$root.translations).split('|') }
      catch(e){ return key }

      translation = (!count || count > 1) && translation.length > 1 ? translation[1] : translation[0];
      for(let placeholder in replace) translation = translation.replace(`:${placeholder}`, replace[placeholder]);

      return translation;
    }
  },
}
