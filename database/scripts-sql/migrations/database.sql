-- CREATE USERS TABLE
CREATE SEQUENCE users_id_seq;
CREATE TABLE public.users
(
    id integer NOT NULL DEFAULT nextval('users_id_seq'::regclass),
    name character varying(70) COLLATE pg_catalog."default" NOT NULL,
    email character varying(70) COLLATE pg_catalog."default" NOT NULL,
    username character varying(30) COLLATE pg_catalog."default" NOT NULL,
    remember_token character varying(100) COLLATE pg_catalog."default",
    deleted_at timestamp(0) without time zone,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    CONSTRAINT users_pkey PRIMARY KEY (id),
    CONSTRAINT users_email_unique UNIQUE (email),
    CONSTRAINT users_username_unique UNIQUE (username)
);

-- CREATE SURGEONS TABLE
CREATE SEQUENCE surgeons_id_seq;
CREATE TABLE public.surgeons
(
    id integer NOT NULL DEFAULT nextval('surgeons_id_seq'::regclass),
    crm character varying(20) COLLATE pg_catalog."default" NOT NULL,
    user_id bigint NOT NULL,
    deleted_at timestamp(0) without time zone,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    CONSTRAINT surgeons_pkey PRIMARY KEY (id),
    CONSTRAINT surgeons_crm_unique UNIQUE (crm),
    CONSTRAINT surgeons_user_id_foreign FOREIGN KEY (user_id)
        REFERENCES public.users (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE NO ACTION
);

-- CREATE PROCEDURES TABLE
CREATE SEQUENCE procedures_id_seq;
CREATE TABLE public.procedures
(
    id integer NOT NULL DEFAULT nextval('procedures_id_seq'::regclass),
    name character varying(70) COLLATE pg_catalog."default" NOT NULL,
    sus_code character varying(50) COLLATE pg_catalog."default" NOT NULL,
    deleted_at timestamp(0) without time zone,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    CONSTRAINT procedures_pkey PRIMARY KEY (id),
    CONSTRAINT procedures_sus_code_unique UNIQUE (sus_code)
);

-- CREATE PATIENTS TABLE
CREATE SEQUENCE patients_id_seq;
CREATE TABLE public.patients
(
    id integer NOT NULL DEFAULT nextval('patients_id_seq'::regclass),
    name character varying(70) COLLATE pg_catalog."default" NOT NULL,
    birthday_at date NOT NULL,
    mother_name character varying(70) COLLATE pg_catalog."default" NOT NULL,
    gender character varying(255) COLLATE pg_catalog."default" NOT NULL,
    medical_record character varying(20) COLLATE pg_catalog."default" NOT NULL,
    deleted_at timestamp(0) without time zone,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    CONSTRAINT patients_pkey PRIMARY KEY (id),
    CONSTRAINT patients_medical_record_unique UNIQUE (medical_record),
    CONSTRAINT patients_gender_check CHECK (gender::text = ANY (ARRAY['M'::character varying, 'F'::character varying, 'O'::character varying]::text[]))
);

-- CREATE STATUS TABLE
CREATE SEQUENCE status_id_seq;
CREATE TABLE public.status
(
    id integer NOT NULL DEFAULT nextval('status_id_seq'::regclass),
    name character varying(20) COLLATE pg_catalog."default" NOT NULL,
    description text COLLATE pg_catalog."default" NOT NULL,
    deleted_at timestamp(0) without time zone,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    CONSTRAINT status_pkey PRIMARY KEY (id),
    CONSTRAINT status_name_unique UNIQUE (name)
);

-- CREATE SURGERY_CLASSIFICATIONS TABLE
CREATE SEQUENCE surgery_classifications_id_seq;
CREATE TABLE public.surgery_classifications
(
    id integer NOT NULL DEFAULT nextval('surgery_classifications_id_seq'::regclass),
    name character varying(70) COLLATE pg_catalog."default" NOT NULL,
    description text COLLATE pg_catalog."default" NOT NULL,
    deleted_at timestamp(0) without time zone,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    CONSTRAINT surgery_classifications_pkey PRIMARY KEY (id),
    CONSTRAINT surgery_classifications_name_unique UNIQUE (name)
);

-- CREATE SURGICAL_ROOMS TABLE
CREATE SEQUENCE surgical_rooms_id_seq;
CREATE TABLE public.surgical_rooms
(
    id integer NOT NULL DEFAULT nextval('surgical_rooms_id_seq'::regclass),
    name character varying(70) COLLATE pg_catalog."default" NOT NULL,
    available boolean NOT NULL DEFAULT true,
    morning_reservation_starts_at character varying(8) COLLATE pg_catalog."default" NOT NULL,
    morning_reservation_ends_at character varying(8) COLLATE pg_catalog."default" NOT NULL,
    afternoon_reservation_starts_at character varying(8) COLLATE pg_catalog."default" NOT NULL,
    afternoon_reservation_ends_at character varying(8) COLLATE pg_catalog."default" NOT NULL,
    deleted_at timestamp(0) without time zone,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    CONSTRAINT surgical_rooms_pkey PRIMARY KEY (id),
    CONSTRAINT surgical_rooms_name_unique UNIQUE (name)
);

-- CREATE ANESTHETICS TABLE
CREATE SEQUENCE anesthetics_id_seq;
CREATE TABLE public.anesthetics
(
    id integer NOT NULL DEFAULT nextval('anesthetics_id_seq'::regclass),
    name character varying(70) COLLATE pg_catalog."default" NOT NULL,
    deleted_at timestamp(0) without time zone,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    CONSTRAINT anesthetics_pkey PRIMARY KEY (id),
    CONSTRAINT anesthetics_name_unique UNIQUE (name)

);

-- CREATE SURGERIES TABLE
CREATE SEQUENCE surgeries_id_seq;
CREATE TABLE public.surgeries
(
    id integer NOT NULL DEFAULT nextval('surgeries_id_seq'::regclass),
    estimated_duration_time integer NOT NULL,
    anesthetic_evaluation text COLLATE pg_catalog."default",
    materials text COLLATE pg_catalog."default" NOT NULL,
    observation text COLLATE pg_catalog."default",
    procedure_id bigint NOT NULL,
    surgery_classification_id bigint NOT NULL,
    patient_id bigint NOT NULL,
    deleted_at timestamp(0) without time zone,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    CONSTRAINT surgeries_pkey PRIMARY KEY (id),
    CONSTRAINT surgeries_patient_id_foreign FOREIGN KEY (patient_id)
        REFERENCES public.patients (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE NO ACTION,
    CONSTRAINT surgeries_procedure_id_foreign FOREIGN KEY (procedure_id)
        REFERENCES public.procedures (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE NO ACTION,
    CONSTRAINT surgeries_surgery_classification_id_foreign FOREIGN KEY (surgery_classification_id)
        REFERENCES public.surgery_classifications (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE NO ACTION
);

-- CREATE EVENTS TABLE
CREATE SEQUENCE events_id_seq;
CREATE TABLE public.events
(
    id integer NOT NULL DEFAULT nextval('events_id_seq'::regclass),
    title character varying(70) COLLATE pg_catalog."default" NOT NULL,
    color character varying(7) COLLATE pg_catalog."default" NOT NULL,
    start_at timestamp(0) without time zone NOT NULL,
    end_at timestamp(0) without time zone NOT NULL,
    surgery_id bigint NOT NULL,
    surgical_room_id bigint NOT NULL,
    entrance_at_surgical_center timestamp(0) without time zone,
    entrance_at_surgical_room timestamp(0) without time zone,
    time_out_at timestamp(0) without time zone,
    anesthetic_induction timestamp(0) without time zone,
    surgeon_started_at timestamp(0) without time zone,
    surgeon_ended_at timestamp(0) without time zone,
    exit_surgical_room timestamp(0) without time zone,
    entrance_repai timestamp(0) without time zone,
    exit_repai timestamp(0) without time zone,
    exit_surgery_center timestamp(0) without time zone,
    deleted_at timestamp(0) without time zone,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    CONSTRAINT events_pkey PRIMARY KEY (id),
    CONSTRAINT events_surgery_id_foreign FOREIGN KEY (surgery_id)
        REFERENCES public.surgeries (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE NO ACTION,
    CONSTRAINT events_surgical_room_id_foreign FOREIGN KEY (surgical_room_id)
        REFERENCES public.surgical_rooms (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE NO ACTION
);

-- CREATE LOGS TABLE
CREATE SEQUENCE logs_id_seq;
CREATE TABLE public.logs
(
    id integer NOT NULL DEFAULT nextval('logs_id_seq'::regclass),
    observation text COLLATE pg_catalog."default" NOT NULL,
    surgery_id bigint NOT NULL,
    status_id bigint NOT NULL,
    user_id bigint NOT NULL,
    deleted_at timestamp(0) without time zone,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    CONSTRAINT logs_pkey PRIMARY KEY (id),
    CONSTRAINT logs_status_id_foreign FOREIGN KEY (status_id)
        REFERENCES public.status (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE NO ACTION,
    CONSTRAINT logs_surgery_id_foreign FOREIGN KEY (surgery_id)
        REFERENCES public.surgeries (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE NO ACTION,
    CONSTRAINT logs_user_id_foreign FOREIGN KEY (user_id)
        REFERENCES public.users (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE NO ACTION
);

-- CREATE REASONS_FOR_RESCHEDULING TABLE
CREATE SEQUENCE reasons_for_rescheduling_id_seq;
CREATE TABLE public.reasons_for_rescheduling
(
    id integer NOT NULL DEFAULT nextval('reasons_for_rescheduling_id_seq'::regclass),
    name character varying(70) COLLATE pg_catalog."default" NOT NULL,
    description text COLLATE pg_catalog."default" NOT NULL,
    deleted_at timestamp(0) without time zone,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    CONSTRAINT reasons_for_rescheduling_pkey PRIMARY KEY (id),
    CONSTRAINT reasons_for_rescheduling_name_unique UNIQUE (name)
);

-- CREATE RESCHEDULING_HISTORY TABLE
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

-- CREATE SURGERY_HAS_ANESTHETICS TABLE
CREATE SEQUENCE surgery_has_anesthetics_id_seq;
CREATE TABLE public.surgery_has_anesthetics
(
    id integer NOT NULL DEFAULT nextval('surgery_has_anesthetics_id_seq'::regclass),
    surgery_id bigint NOT NULL,
    anesthesia_id bigint NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    CONSTRAINT surgery_anesthetics_pkey PRIMARY KEY (id),
    CONSTRAINT surgery_anesthetics_anesthesia_id_foreign FOREIGN KEY (anesthesia_id)
        REFERENCES public.anesthetics (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE NO ACTION,
    CONSTRAINT surgery_anesthetics_surgery_id_foreign FOREIGN KEY (surgery_id)
        REFERENCES public.surgeries (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE NO ACTION
);

-- CREATE SURGEON_HAS_SURGERIES TABLE
CREATE SEQUENCE surgeon_has_surgeries_id_seq;
CREATE TABLE public.surgeon_has_surgeries
(
    id integer NOT NULL DEFAULT nextval('surgeon_has_surgeries_id_seq'::regclass),
    head_surgeon boolean NOT NULL,
    surgeon_id bigint NOT NULL,
    surgery_id bigint NOT NULL,
    deleted_at timestamp(0) without time zone,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    CONSTRAINT surgeon_has_surgeries_pkey PRIMARY KEY (id),
    CONSTRAINT surgeon_has_surgeries_surgeon_id_foreign FOREIGN KEY (surgeon_id)
        REFERENCES public.surgeons (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE NO ACTION,
    CONSTRAINT surgeon_has_surgeries_surgery_id_foreign FOREIGN KEY (surgery_id)
        REFERENCES public.surgeries (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE NO ACTION
);

-- CREATE PERMISSIONS TABLE
CREATE SEQUENCE permissions_id_seq;
CREATE TABLE public.permissions
(
    id bigint NOT NULL DEFAULT nextval('permissions_id_seq'::regclass),
    name character varying(50) COLLATE pg_catalog."default" NOT NULL,
    slug character varying(50) COLLATE pg_catalog."default" NOT NULL,
    description text COLLATE pg_catalog."default",
    deleted_at timestamp(0) without time zone,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    CONSTRAINT permissions_pkey PRIMARY KEY (id),
    CONSTRAINT permissions_name_unique UNIQUE (name)
);

-- CREATE USER_HAS_PERMISSIONS TABLE
CREATE TABLE public.user_has_permissions
(
    user_id bigint NOT NULL,
    permission_id bigint NOT NULL,
    CONSTRAINT user_has_permissions_pkey PRIMARY KEY (user_id, permission_id),
    CONSTRAINT user_has_permissions_permission_id_foreign FOREIGN KEY (permission_id)
        REFERENCES public.permissions (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE CASCADE,
    CONSTRAINT user_has_permissions_user_id_foreign FOREIGN KEY (user_id)
        REFERENCES public.users (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE CASCADE
);

-- CREATE GROUPS TABLE
CREATE SEQUENCE groups_id_seq;
CREATE TABLE public.groups
(
    id bigint NOT NULL DEFAULT nextval('groups_id_seq'::regclass),
    name character varying(50) COLLATE pg_catalog."default" NOT NULL,
    slug character varying(50) COLLATE pg_catalog."default" NOT NULL,
    description text COLLATE pg_catalog."default",
    deleted_at timestamp(0) without time zone,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    CONSTRAINT groups_pkey PRIMARY KEY (id),
    CONSTRAINT groups_name_unique UNIQUE (name),
    CONSTRAINT groups_slug_unique UNIQUE (slug)
);

-- CREATE GROUP_HAS_PERMISSIONS TABLE
CREATE TABLE public.group_has_permissions
(
    group_id bigint NOT NULL,
    permission_id bigint NOT NULL,
    CONSTRAINT group_has_permissions_pkey PRIMARY KEY (group_id, permission_id),
    CONSTRAINT group_has_permissions_group_id_foreign FOREIGN KEY (group_id)
        REFERENCES public.groups (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE CASCADE,
    CONSTRAINT group_has_permissions_permission_id_foreign FOREIGN KEY (permission_id)
        REFERENCES public.permissions (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE CASCADE
);

-- CREATE USER_HAS_GROUPS TABLE
CREATE TABLE public.user_has_groups
(
    user_id bigint NOT NULL,
    group_id bigint NOT NULL,
    CONSTRAINT user_has_groups_pkey PRIMARY KEY (user_id, group_id),
    CONSTRAINT user_has_groups_group_id_foreign FOREIGN KEY (group_id)
        REFERENCES public.groups (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE CASCADE,
    CONSTRAINT user_has_groups_user_id_foreign FOREIGN KEY (user_id)
        REFERENCES public.users (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE CASCADE
);
