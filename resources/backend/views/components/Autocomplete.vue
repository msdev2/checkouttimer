<template>
    <label class="form-label">Enter IP Address / Country</label>
    <div class="autocomplete" ref="autocomplete">
        <div class="input-group">
            <input autocomplete="false" id="inputField" @keyup.enter="addTag"  @input="updateSuggestions" @keyup.50="addTag" class="form-input autocomplete" v-model="searchText" type="text" />
            <button id="addButton" @click="addTag" class="secondary">Add</button>
        </div>
        <ul class="suggestions" v-if="showSuggestions">
            <li v-for="(suggestion,i) in filteredSuggestions" :key="'sugg'+i" @click="selectSuggestion(suggestion)">
                <img style="width:16px" :src="'https://cdn.jsdelivr.net/npm/svg-country-flags@1.2.10/svg/'+suggestion.value.toLowerCase()+'.svg'"> &nbsp; {{ suggestion.text }}
            </li>
        </ul>
    </div>
    <p id="validationResult"></p>
    <div class="row" id="tags" v-if="value && value.length > 0">
        <span v-for="(data,key) in value" :key="key" class="tag remove" :class="data.type == 'IP'? 'green' : 'blue'">
            <img v-if="data.type == 'Country'" style="width:16px" :src="'https://cdn.jsdelivr.net/npm/svg-country-flags@1.2.10/svg/'+data.value.toLowerCase()+'.svg'">
            {{ data.text }} <a href="#" @click="removeTag(key)"></a>
        </span>
    </div>
</template>
<script>
import countries from "@/js/countries.json";
export default {
    props: {
        value: {
            type: Object,
            required: true
        }
    },
    data() {
        return {
            searchText: '',
            suggestions: countries,
            showSuggestions: false,
            filteredSuggestions: []
        }
    },
    methods: {
        updateSuggestions() {
            const searchText = this.searchText.toLowerCase();
            this.filteredSuggestions = this.suggestions.filter(suggestion =>
                suggestion.text.toLowerCase().startsWith(searchText)
            );
            this.showSuggestions = true;
        },
        selectSuggestion(suggestion) {
            this.searchText = suggestion.text;
            this.hideSuggestions();
            this.addTag();
        },
        hideSuggestions() {
            this.showSuggestions = false;
        },
        handleClickOutside(event) {
            if (this.$refs.autocomplete && !this.$refs.autocomplete.contains(event.target)) {
                this.hideSuggestions();
            }
        },
        isIPAddress(str) {
            const ipAddressPattern = /^(\d{1,3}\.){3}\d{1,3}$/;
            return ipAddressPattern.test(str);
        },
        removeTag(index){
            this.value.splice(index, 1);   
            this.$emit('input', this.value);
            return false;
        },
        addTag(){
            if(!this.searchText) return;
            if(this.isIPAddress(this.searchText)) {
                this.value.push({type:"IP",value:this.searchText,text:this.searchText});
                this.$emit('input', this.value);
                this.searchText = '';
                return;
            }
            if(this.value && this.value.includes(this.searchText)) return;
            let index = this.suggestions.findIndex(std=> std.text === this.searchText)
            if(index != -1){ 
                this.value.push({type:"Country",value:this.suggestions[index].value,text:this.suggestions[index].text});
                this.$emit('input', this.value);
            }
            this.searchText = '';
        },
    }
}
</script>

<style scoped>
.autocomplete {
  position: relative;
  display: inline-block;
  width: 100%;
}
.suggestions {
  position: absolute;
  list-style: none;
  background-color: #f9f9f9;
  border: 1px solid #ccc;
  padding: 0;
  margin: 0;
  z-index: 999;
}

.suggestions li {
  padding: 8px;
  cursor: pointer;
}

.suggestions li:hover {
  background-color: #e0e0e0;
}
div#tags {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
}

div#tags span {
    margin: 0;
}
</style>