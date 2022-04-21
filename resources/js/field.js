import DetailField from './components/Detail/KeyValueField'
import FormField from './components/Form/KeyValueField'

Nova.booting((app, store) => {
  app.component('detail-values', DetailField)
  app.component('form-values', FormField)
})
