<template>
    <div>
        <h1>Words:</h1>
        <a href="/" class="float-right">Back</a>
        <table class="table table-hover">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Words</th>
                <th scope="col">Created at</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="word in words" :key="word.id">
                    <th scope="row">{{word.id}}</th>
                    <td>{{word.words}}</td>
                    <td>{{word.created_at}}</td>
                </tr>
            </tbody>
        </table>
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <li class="page-item" :class="{'disabled' :meta.current_page === 1}">
                    <a class="page-link" href="#" aria-label="Previous" @click="getWords(meta.current_page-1)">
                        <span aria-hidden="true">&laquo;</span>
                        <span class="sr-only">Previous</span>
                    </a>
                </li>
                <li 
                    class="page-item" 
                    :class="{'active': index === meta.current_page}"
                    v-for="index in meta.last_page" :key="index"
                >
                    <a class="page-link" href="#" @click="getWords(index)">{{index}}</a>
                </li>

                <li class="page-item" :class="{'disabled' :meta.current_page === meta.last_page}">
                    <a class="page-link" href="#" aria-label="Next" @click="getWords(meta.current_page+1)">
                        <span aria-hidden="true">&raquo;</span>
                        <span class="sr-only">Next</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</template>

<script>
import axios from 'axios'

    export default {
        data() {
            return {
                words: [],
                meta: [],
            }
        },

        mounted() {
            this.getWords();
        },

        methods: {
            getWords(page) {
                axios.get('getWords', {
                    params: {
                        page
                    }
                })
                .then(response => {
                    this.words = response.data.data;
                    this.meta = response.data.meta;
                })
                .catch(error => {

                })
            }
        }
    }
</script>
