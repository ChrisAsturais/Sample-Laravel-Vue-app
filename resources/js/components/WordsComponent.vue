<template>
    <div>
        <h1>Words:</h1>
        <a href="/previous-search" class="float-right"> Previous Search</a>
        <div class="form-group">
            <input type="text" class="form-control" id="words" placeholder="Enter words..." v-model="words">
        </div>

        <button class="btn btn-primary" @click="getDefinition()" :disabled="disabled" >Submit</button>
        
        <div v-if="error" class="mt-3">
            <div class="alert alert-secondary" role="alert">
                {{ error }}
            </div>
        </div>
        <div v-else class="mt-3">
            <div class="mb-3" v-for="d in definitions" :key="d">
                <span class="font-weight-bold">Definition: </span> {{ d.definition }} <br>
                <span class="font-weight-bold">Part of speech: </span> {{ d.partOfSpeech }}
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios'

    export default {
        data() {
            return {
                words: "",
                definitions: [],
                error: '',
                disabled: false,
            }
        },
        
        methods: {
            getDefinition() {
                this.definitions = [];
                this.error = '';
                this.disabled = true;
                const options = {
                    method: 'GET',
                    url: `https://wordsapiv1.p.rapidapi.com/words/${this.words}/definitions`,
                    headers: {
                        'X-RapidAPI-Host': 'wordsapiv1.p.rapidapi.com',
                        'X-RapidAPI-Key': 'd715a822bdmshbac989e6f7d5881p17d783jsn951e98174c91'
                    }
                };

                axios.request(options)
                .then(response => {
                    this.definitions = response.data.definitions
                    this.disabled = false;

                    axios.post('words', {
                        words: this.words
                    })
                })
                .catch(error => {
                    console.log(error);
                    this.disabled = false;
                    this.error = 'Word not found';
                })
            }
        }
    }
</script>
