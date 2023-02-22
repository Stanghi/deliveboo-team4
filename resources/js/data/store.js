import {reactive} from 'vue'

export const store = reactive({
    restaurants: [],
    categories: [],
    team_members: [],
    filterCategory: new Array,
});
