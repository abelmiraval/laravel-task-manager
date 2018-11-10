<template>
    <div class="container">
        <br>
        <button class="button is-primary is-big modal-button" data-target="modal-ter" aria-haspopup="true" @click="openModal()">New Category</button>
        <div id="modal-term" class="modal">
            <div class="modal-background"></div>
            <div class="modal-card">
                <header class="modal-card-head">
                    <p class="modal-card-title">Register Category</p>
                    <button class="delete" aria-label="close" @click="closeModal()"></button>
                </header>
                <section class="modal-card-body">
                    <form action="">
                        
                        <div class="field">
                            <label class="label">Nombre</label>
                            <div class="control">
                                <input class="input" type="text" placeholder="name category" id="category"  name="name" v-model="category.name">
                            </div>
                        </div>

                        <div>
                            <label for="descripcion" class="label">Descripcion</label>
                            <div class="control">
                                <input type="text" class="input" placeholder="name category" name="description" id="category" v-model="category.description">
                            </div>
                        </div>

                        <br>
                        <div class="field is-grouped">
                            <div class="control">
                                <button class="button is-link" @click="AddCategory()">Add</button>
                            </div>
                        </div>
                    </form>
                    <br><h2 style="text-align: center; font-weight: bold;">Listado de categorias</h2><br>
                    <table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth">
                        <thead>
                            <tr>
                                <th>nombre</th>
                                <th>description</th>    
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                
                                <td>Lorem ipsum - cell B1</td>
                           
                                
                            </tr>
                            <tr>
                                <td>Lorem ipsum - cell A2</td>
                                <td>Lorem ipsum - cell B2</td>
                                
                               
                            </tr>
                            
                        </tbody>
                    </table>
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
            category: {
            name: "",
            description: ""
            },
        listActivity: [],
        errors: []
        }
    },

      methods: {
    /*listarCategory() {
      let mylist = this;
      axios
        .get("/categoria")
        .then(function(response) {
          mylist.arrayCategory = response.data;
        })
        .catch(function(error) {
          console.log(error);
        });
    },*/

    AddCategory() {
      
      axios
        .post("/category",{
            'name':this.category.name,
            'description': this.category.description
        })
        .then(function(response) {
          this.reset();
          this.closeModal();
        })
        .catch(function(error) {
          console.log(error);
        });
    },
    openModal() {
      document.getElementById("modal-term").classList.add("is-active");
    },
    closeModal() {
      document.getElementById("modal-term").classList.remove("is-active");
    },
    addNewActivity() {}
  }
  
};
</script>
