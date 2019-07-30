<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-default">
                    <div class="card-header">{{question.display_text}}
                        <button type="button" class="close"  data-toggle="modal" data-target="#questionModal">
                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                        </button>
                    </div>
                    <div class="card-body">
                        <p>{{question.question_text}}</p>
                        <div v-for="item of answers" class="form-check">
                            <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="" id="" value="checkedValue" >
                                {{ item.value }}
                            </label>
                            <a href="#" v-on:click="editAnswer(item)" data-toggle="modal" data-target="#editAnswerModal">Edit</a>
                        </div>

                        <br />
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createAnswerModal">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add Answer
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
                                <input type="text" class="form-control" name="display_text" id="display_text" placeholder="Display Text" v-model="question.display_text" />
                            </div>
                            <div class="form-group">
                                <label for="question_text">Question Text</label>
                                <textarea class="form-control" name="question_text" id="question_text" rows="3" v-model="question.question_text"></textarea>
                            </div>
                            <div class="form-check form-check-inline">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox" name="required" id="required" v-model="question.required"> Required
                                </label>
                            </div>
                            <div class="form-group">
                            <label for="type">Type</label>
                                <input type="text" class="form-control" name="type" id="type" aria-describedby="helpId" placeholder="Type" v-model="question.type" />
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-dismiss="modal" v-on:click="saveQuestion"><i class="fa fa-floppy-o" aria-hidden="true"></i> Update Question</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="modal" id="createAnswerModal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Question</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form ref="createAnswerForm">
                        <input type="hidden" name="question_id" v-model="question.id">
                        <slot>
                            <!-- CSRF gets injected into this slot -->
                        </slot> 
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="display_text">Answer</label>
                                <input type="text" class="form-control" name="value" id="value" placeholder="Answer" />
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-dismiss="modal" v-on:click="storeAnswer"><i class="fa fa-floppy-o" aria-hidden="true"></i> Add Answer</button>
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
                            <button type="button" class="btn btn-primary" data-dismiss="modal" v-on:click="updateAnswer"><i class="fa fa-floppy-o" aria-hidden="true"></i> Update Answer</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal" v-on:click="destroyAnswer"><i class="fa fa-trash" aria-hidden="true"></i> Delete Answer</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </form>
                     <form ref="destroyAnswerForm">
                        <input type="hidden" name="_method" value="DELETE" />
                        <input type="hidden" name="id" v-model="currentAnswer.id" /> 
                        <slot>
                            <!-- CSRF gets injected into this slot -->
                        </slot> 
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
                question: '',
                answers: [],
                currentAnswer: ''          
            }
        },
        props:['questionData', 'answerData'],
        mounted() {
            this.question = this.questionData;
            this.answers = this.answerData;
        },
        methods: {
            saveQuestion() {
                axios.post('/questions/'+this.question.id, new FormData(this.$refs.myForm)).then(response => {
                    alert('Question updated!');
                }).catch(error => {
                    console.log(error);
                })
            },
            createAnswer(){
                this.currentAnswer = [];
            },
            storeAnswer() {
                axios.post('/answers', new FormData(this.$refs.createAnswerForm)).then(response => {
                    console.log(response);
                    this.answers.push(response.data);
                    alert('Answer created!');
                }).catch(error => {
                    console.log(error);
                })
            },
            editAnswer(answer){
                this.currentAnswer = answer;
            },
            updateAnswer() {
                axios.post('/answers/'+this.currentAnswer.id, new FormData(this.$refs.editAnswerForm)).then(response => {
                    this.currentAnswer = [];
                    alert('Answer updated!');
                }).catch(error => {
                    console.log(error);
                })
            },
            destroyAnswer(answer){
                axios.post('/answers/'+this.currentAnswer.id, new FormData(this.$refs.destroyAnswerForm)).then(response => {
                    this.answers.splice(this.answers.indexOf(this.currentAnswer), 1);
                    this.currentAnswer = [];
                    alert('Answer updated!');
                }).catch(error => {
                    console.log(error);
                })
            }
        }
    }
</script>
