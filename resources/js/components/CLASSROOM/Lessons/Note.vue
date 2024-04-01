<template>
  <section :class="['lesson-notes-editor', type]">
    <header class="lesson-notes-head">
      <div class="lesson-notes-title">{{trans('classroom.notes_lesson')}}</div>
      <!-- <nav class="lesson-notes-navbar">
        <div class="lesson-notes-navbar-trigger"><span></span><span></span><span></span></div>
        <div class="lesson-notes-navbar-options-container"></div>
      </nav> -->
    </header>
    <quill-editor
      ref="editor"
      v-model="note.content"
      :options="editorOptions"
      @blur="onEditorBlur($event)"
      @focus="onEditorFocus($event)"
      @ready="onEditorReady($event)">
      <!-- @change="onEditorChange($event)" -->
    </quill-editor>
    <footer class="lesson-notes-foot">
      <div class="lesson-notes-save" @click="save">
        <i class="fas fa-save"></i>
      </div>
    </footer>
  </section>
</template>

<script>
  export default {
    props: {
      lesson: {
        type: Object,
        required: true,
        default: null,
      },
      note: {
        type: Object,
        required: true,
        default: null,
      },
    },

    data() {
      return {
        loading: {
          note: false,
        },
        type: 'is-primary',
        editorOptions: {
          theme: 'snow', // or bubble
          placeholder: this.trans('classroom.notes_lesson'),
          modules: {
            toolbar: [
              ['bold', 'italic', 'underline', 'strike', { 'list': 'bullet' }],
              ['image']
            ],
          },
        },
      }
    },

    watch: {},

    computed: {
      editor() {
        return this.$refs.editor.quill;
      },
    },

    methods: {
      init() {},
      onEditorBlur(editor) {
        console.log('editor blur!', editor)
      },
      onEditorFocus(editor) {
        console.log('editor focus!', editor)
      },
      onEditorReady(editor) {
        console.log('editor ready!', editor)
      },
      onEditorChange({ editor, html, text }) {
        console.log('editor change!', editor, html, text)
        this.content = html
      },
      async save() {
        this.loading.note = true;
        await axios.post(`/lessons/${this.lesson.id}/comment`, this.note).then(response => this.$root.showToast(response.data.message));
        this.loading.note = false;
        this.$emit('saved', this.note);
      },
    },

    mounted() {
      this.init();
    }
  }
</script>