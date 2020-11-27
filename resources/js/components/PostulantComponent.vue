<template>
    <div class="card">
        <div class="card-header">
            <div>
                <b><i class="fa fa-user"></i>Listado de postulantes</b>
                <span v-if="laravelData.data">({{ laravelData.data.length }})</span>
            </div>
            <div class="flex-grow-0 d-flex">
                <button v-if="form.postulantes.length > 0 && canAccept" class="btn btn-sm btn-primary mr-1"
                        @click="setStatusAll"><i class="fa fa-check"></i> Aprobar
                    ({{ form.postulantes.length }})
                </button>
                <DlgSendMailPostulante v-if="canMail" v-model="dialogMail"
                                       :event="event" @onSend="onSend"/>
            </div>
        </div>
        <div class="card-body p-0">
            <Loader :loading="loader"></Loader>
            <slot></slot>
            <div class="table-responsive m-0">
                <table v-if="!loader && laravelData" class="table table-bordered table-hover m-0 table-sm ">
                    <thead>
                    <tr class="align-middle">
                        <th class="text-center"></th>
                        <th>Estudiante</th>
                        <th>Estado</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="p in laravelData.data" :key="p.id">
                        <td class="text-center td-radio" width="1%">
                            <label v-if="p.status === 0" class="form-check-label">
                                <input v-model.number="form.postulantes" :aria-label="'Seleccionar '+p.name"
                                       :value="p.id"
                                       class="form-check-input"
                                       type="checkbox">
                            </label>
                        </td>
                        <td data-name="Estudiante">{{ p.surname }} {{ p.name }}</td>
                        <td data-name="Estado">
                            <small v-if="p.status === 1" class="text-success"><b>Aprobado</b></small>
                            <small v-if="p.status === 0" class="text-danger"><b>No aprobado</b></small>
                            <small v-if="p.status === 2" class="text-success"><b>Notificado</b></small>
                        </td>
                        <td class="text-right">
                            <button v-if="canAccept"
                                    :class="`btn btn-outline-${(p.status === 0 ? 'primary': 'danger')} btn-sm`"
                                    :disabled="loaderStatus"
                                    type="button"
                                    @click="setStatus(p)">
                                <i :class="`fa fa-${p.status === 0 ? 'check' : 'times'}`"></i>
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td v-if="laravelData.data.length <=0" class="no-data" colspan="4">No hay postulantes para este
                            evento
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-body py-0 text-center">
            <pagination :data="laravelData" @pagination-change-page="getPostulantes"/>
        </div>
    </div>
</template>

<script>
import Loader from "./_partials/Loader";
import DlgSendMailPostulante from "./_dialog/DlgSendMailPostulante";

export default {
    name: "Postulantes",
    components: {DlgSendMailPostulante, Loader},
    props: {
        event: {
            type: Number | String,
            default: null
        },
        canAccept: {
            type: Boolean,
            default: false
        },
        canMail: {
            type: Boolean,
            default: false
        }
    },
    data: () => ({
        loader: false,
        loaderStatus: false,
        laravelData: {},
        dialogMail: false,
        form: {
            postulantes: []
        }
    }),
    created() {
        this.getPostulantes();
    },
    methods: {
        getPostulantes(page = 1) {
            if(!this.event) return;
            this.loader = true;
            axios.get(`/postulantes/listar/${this.event}?page=${page}`).then((res) => {
                if (res.data) {
                    this.laravelData = res.data.body;
                }
            }).finally(() => this.loader = false);
        },
        setStatusAll(){
            if (!this.canAccept) return;

            this.loaderStatus = true;
            axios.put(`/postulantes/accept/all`, this.form).then(res => {
                if (res.data.ok){
                    this.laravelData.data.forEach(e => {
                        this.form.postulantes.forEach(p => {
                            if (e.id === p) {
                                e.status = 1;
                            }
                        })
                    });
                    this.form.postulantes = [];
                    this.$alert.ok(res.data.message);
                }
            }).catch(err => {

            }).finally(() => this.loaderStatus = false);
        },
        setStatus(p) {
            if (!this.canAccept) return;
            this.loaderStatus = true;
            axios.get('/postulantes/accept/' + p.id).then(res => {
                if (res.data.ok) {
                    p.status = res.data.body;
                    this.$alert.ok(res.data.message);
                }
            }).catch(err => {
                this.$alert.err("Error al aprobar la postulación, contacte con soporte");
            }).finally(() => this.loaderStatus = false);
        },
        onSend(p) {
            this.laravelData.data.forEach(e => {
                if (e.id === p.id) {
                    e.status = p.status;
                    return;
                }
            })
        },
    },
}
</script>

