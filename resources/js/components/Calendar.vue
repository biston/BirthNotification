<template>
  <FunctionalCalendar
    v-model="calendarData"
    :configs="calendarConfigs"
  >


  </FunctionalCalendar>
</template>

<script>
import { FunctionalCalendar } from 'vue-functional-calendar';

export default {
    components: {
        FunctionalCalendar
    },
    data() {
        return {
            calendarData: {},
            calendarConfigs: {
                sundayStart: false,
                dateFormat: 'yyyy-mm-dd',
                isDatePicker: false,
                isDateRange: false,
                dayNames: ['Lun', 'Mar', 'Mer', 'Jeu', 'Ven', 'Sam', 'Dim'],
                monthNames:['Janvier','Février','Mars','Avril','Mai','Juin','Juillet','Aout','Septembre','Octobre','Nomvembre','Décembre']
            }
        }
    },
}

</script>

<style>

</style>
