<template>
    <div class="container">
        <button class="button is-primary is-small modal-button" data-target="modal-ter" aria-haspopup="true" @click="openModal()">New Activity</button>
        <div id="modal-ter" class="modal">
            <div class="modal-background"></div>
            <div class="modal-card">
                <header class="modal-card-head">
                    <p class="modal-card-title">Register Activity</p>
                    <button class="delete" aria-label="close" @click="closeModal()"></button>
                </header>
                <section class="modal-card-body">
                        <div class="field">
                            <label class="label">Category</label>
                            <div class="control">
                                <div class="select">
                                    <select v-model="activity.category_id">
                                            <option>Select dropdown</option>
                                            <option>With options</option>
                                            <option>Action</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="field">
                            <label class="label">Activity</label>
                            <div class="control">
                                <input class="input" type="text" placeholder="Text activity" id="activity"  name="activity" v-model="activity.name">
                            </div>
                        </div>

                        <div class="field">
                            <div class="control">
                                <label class="radio" for="low">
                                    <input type="radio" name="priority" id="low" value="low" v-model="activity.priority">
                                        Low
                                </label>
                                <label class="radio" for="medium">
                                    <input type="radio" name="priority" id="medium" value="medium" v-model="activity.priority">
                                        Medium
                                </label>
                                <label class="radio" for="high">
                                    <input type="radio" name="priority" id="high" value="high" v-model="activity.priority">
                                        High
                                </label>
                            </div>
                        </div>
                        <div class="field is-grouped">
                            <div class="control">
                                <button class="button is-link" @click="addNewActivity()">Add</button>
                            </div>
                        </div>

                    <!-- <table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth">
                        <thead>
                            <tr>
                                <th>Category</th>
                                <th>Activity</th>
                                <th>Priority</th>
                                <th>Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Lorem ipsum - cell A1</td>
                                <td>Lorem ipsum - cell B1</td>
                                <td>Lorem ipsum - cell C1</td>
                                <td><a class="delete danger"></a></td>
                            </tr>
                            <tr>
                                <td>Lorem ipsum - cell A2</td>
                                <td>Lorem ipsum - cell B2</td>
                                <td>Lorem ipsum - cell C2</td>
                                <td><a class="delete danger"></a></td>
                            </tr>
                            <tr>
                                <td>Lorem ipsum - cell A3</td>
                                <td>Lorem ipsum - cell B3</td>
                                <td>Lorem ipsum - cell C3</td>
                                <td><a class="delete danger"></a></td>
                            </tr>
                            <tr>
                                <td>Lorem ipsum - cell A4</td>
                                <td>Lorem ipsum - cell B4</td>
                                <td>Lorem ipsum - cell C4</td>
                                <td><a class="delete danger"></a></td>
                            </tr>
                        </tbody>
                    </table> -->
                </section>
                <footer class="modal-card-foot">
                    <button class="button is-success">Save changes</button>
                    <button class="button" @click="closeModal()">Cancel</button>
                </footer>
            </div>
        </div>
    </div>
</template>

<script>
export default {
  data() {
    return {
      activity: {
        category_id: 0,
        name: "",
        priority: ""
      },
      listActivity: [],
      errors: []
    };
  },
  mounted() {
    console.log("Component mounted.");
  },
  methods: {
    openModal() {
      document.getElementById("modal-ter").classList.add("is-active");
    },
    closeModal() {
      document.getElementById("modal-ter").classList.remove("is-active");
    },
    addNewActivity() {
      axios
        .post("/activity", {
          name: this.activity.name,
          priority: this.activity.priority
        })
        .then(response => {
          this.reset();
          this.closeModal();
        })
        .catch(error => {
          this.errors = [];
        });
    },
    reset() {
      this.activity = {};
    }
  }
};
</script>
