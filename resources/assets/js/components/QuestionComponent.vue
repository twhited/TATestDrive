<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-default">
                    <div class="card-header">{{this.displayText}}</div>
                    <div class="card-body">
                        <p>{{this.questionText}}</p>
                        <div v-for="item of answers" class="form-check">
                            <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="" id="" value="checkedValue" >
                                {{ item.value }}
                            </label>
                            <a href="#" v-on:click="editAnswer(item)" data-toggle="modal" data-target="#editAnswerModal">Edit</a>
                        </div>

                        <br />

                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#questionModal">
                            Edit Question
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal" id="questionModal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Question</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form ref="myForm">
                        <input type="hidden" name="_method" value="PATCH">
                        <slot>
                            <!-- CSRF gets injected into this slot -->
                        </slot> 
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="display_text">Display Text</label>
                                <input type="text" class="form-control" name="display_text" id="display_text" placeholder="Display Text" v-model="displayText" />
                            </div>
                            <div class="form-group">
                                <label for="question_text">Question Text</label>
                                <textarea class="form-control" name="question_text" id="question_text" rows="3" v-model="questionText"></textarea>
                            </div>
                            <div class="form-check form-check-inline">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox" name="required" id="required" v-model="required"> Required
                                </label>
                            </div>
                            <div class="form-group">
                            <label for="type">Type</label>
                                <input type="text" class="form-control" name="type" id="type" aria-describedby="helpId" placeholder="Type" v-model="type" />
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-dismiss="modal" v-on:click="saveQuestion">Save changes</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="modal" id="editAnswerModal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Answer</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form ref="editAnswerForm">
                        <input type="hidden" name="_method" value="PATCH" />
                        <input type="hidden" name="id" v-model="currentAnswer.id" /> 
                        <slot>
                            <!-- CSRF gets injected into this slot -->
                        </slot> 
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="display_text">Answer</label>
                                <input type="text" class="form-control" name="value" id="value" placeholder="Display Text" v-model="currentAnswer.value" />
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-dismiss="modal" v-on:click="saveAnswer">Save changes</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div>


        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                displayText: '',
                questionText: '',
                type: '',
                required: false,
                answers: [],
                currentAnswer: ''                
            }
        },
        props:['questionData', 'answerData'],
        mounted() {
            this.displayText = this.questionData.display_text;
            this.questionText = this.questionData.question_text;
            this.type = this.questionData.type;
            this.required = this.questionData.required;
            this.answers = this.answerData;
        },
        methods: {
            saveQuestion() {
                axios.post('/questions/1', new FormData(this.$refs.myForm)).then(response => {
                    alert('Question updated!');
                }).catch(error => {
                    console.log(error);
                })
            },

            saveAnswer() {
                axios.post('/answers/'+this.currentAnswer.id, new FormData(this.$refs.editAnswerForm)).then(response => {
                    alert('Answer updated!');
                }).catch(error => {
                    console.log(error);
                })
            },
            editAnswer(answer){
                this.currentAnswer = answer;
            }
        }
    }
</script>
