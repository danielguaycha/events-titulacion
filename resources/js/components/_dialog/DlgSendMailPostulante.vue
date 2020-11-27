<template>
    <div>
        <button class="btn btn-sm btn-outline-primary mr-1"
                title="Envia un correo a los estudiantes aprobados"
                @click="getPostulantes()"><i class="fa fa-envelope mr-1"></i>Enviar notificaciones
        </button>
        <Dialog v-model="show">
            <div class="dlg-header"><b>Enviar notificaciones a estudiantes aprobados</b></div>
            <div class="dlg-body d-flex align-items-center justify-content-center">
                <div v-if="loader" class="loading-email">
                    <span class="spinner-border text-primary py-2" role="status"></span>
                    <i class="fa fa-envelope"></i>
                    <small class="text-muted">Enviando correos...</small>
                    <h4 v-if="postulantes " class="text-muted">
                        <b>{{
                                process <= 0 ? '-' : process
                            }}</b>/<b>{{ postulantes.length <= 0 ? '-' : postulantes.length }}</b>
                    </h4>
                </div>
            </div>
            <div class="dlg-footer text-right">
                <button class="btn btn-danger" @click="show = false;">Cancelar</button>
            </div>
        </Dialog>
        <dlg-confirm ref="confirm"></dlg-confirm>
    </div>
</template>

<script>
import DlgConfirm from "./DlgConfirm";
import Dialog from "../_partials/Dialog";

export default {
    name: "DlgSendMailPostulante",
    props: {
        value: Boolean,
        event: {
            type: Number,
            required: true
        },
    },
    components: {Dialog, DlgConfirm},
    data() {
        return {
            loader: true,
            process: 0,
            cancelSource: null,
            postulantes: [],

        }
    },
    methods: {
        async getPostulantes() {
            const confirm = await this.$refs.confirm.open(
                "Confirmar envío de notificaciones",
                `¿Esta seguro de que desea enviar una notificación por correo a todos los estudiantes aprobados?`
            )
            if (!confirm) {
                return;
            }
            this.show = true;
            this.loader = true;
            axios.get(`/postulantes/accepted/${this.event}`).then(res => {
                if (res.data.ok) {
                    this.postulantes = res.data.body;
                    if (this.postulantes.length > 0) {
                        this.sendEmails();
                    } else {
                        this.$alert.info("No existen notificaciones pendientes");
                        this.show = false;
                    }
                }
            })
        },
        async sendEmails() {
            this.process = 0;
            this.cancelSource = axios.CancelToken.source();
            this.loader = true;
            let sent = 0;
            for (const p of this.postulantes) {
                if (p.status === 1) {
                    try {
                        await axios.post(`/postulantes/notify/${p.id}`, {cancelToken: this.cancelSource.token});
                        this.$emit('onSend', {id: p.id, status: 2});
                        sent++;
                    } catch (e) {
                        this.$alert.err(e);
                        this.show = false;
                        return;
                    }
                }
                this.process++;
            }
            this.cancelSource = null;
            if (sent <= 0) {
                this.$alert.ok("Todos las notificaciones ya fueron entregados!");
            } else {
                this.$alert.ok(`Se emitieron ${sent} notificaciones`);
            }
            this.show = false;
        }
    },
    computed: {
        show: {
            get() {
                return this.value
            },
            set(value) {
                this.$emit('input', value)
            }
        },
    },
}
</script>

<style scoped>

</style>
