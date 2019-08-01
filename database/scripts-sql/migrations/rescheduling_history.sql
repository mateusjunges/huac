CREATE SEQUENCE rescheduling_history_id_seq;
CREATE TABLE public.rescheduling_history
(
    id integer NOT NULL DEFAULT nextval('rescheduling_history_id_seq'::regclass),
    rescheduling_reason_id bigint NOT NULL,
    log_id bigint NOT NULL,
    deleted_at timestamp(0) without time zone,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    CONSTRAINT rescheduling_history_pkey PRIMARY KEY (id),
    CONSTRAINT rescheduling_history_log_id_foreign FOREIGN KEY (log_id)
        REFERENCES public.logs (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE NO ACTION,
    CONSTRAINT rescheduling_history_rescheduling_reason_id_foreign FOREIGN KEY (rescheduling_reason_id)
        REFERENCES public.reasons_for_rescheduling (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE NO ACTION
);
