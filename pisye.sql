--
-- PostgreSQL database dump
--

-- Dumped from database version 9.6.7
-- Dumped by pg_dump version 9.6.7

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;
SET row_security = off;

--
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: -
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: -
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET search_path = public, pg_catalog;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: cualitative_grades; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE cualitative_grades (
    id integer NOT NULL,
    name character varying(255) NOT NULL,
    "order" integer NOT NULL,
    deleted_at timestamp(0) without time zone,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


--
-- Name: cualitative_grades_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE cualitative_grades_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- Name: cualitative_grades_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE cualitative_grades_id_seq OWNED BY cualitative_grades.id;


--
-- Name: grades; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE grades (
    id integer NOT NULL,
    student_id integer NOT NULL,
    group_id integer NOT NULL,
    partial_id integer NOT NULL,
    comments text,
    cuantitative numeric(5,2),
    participation integer NOT NULL,
    punctuality integer NOT NULL,
    working_disposition integer NOT NULL,
    homework integer NOT NULL,
    deleted_at timestamp(0) without time zone,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


--
-- Name: grades_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE grades_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- Name: grades_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE grades_id_seq OWNED BY grades.id;


--
-- Name: group_student; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE group_student (
    group_id integer NOT NULL,
    user_id integer NOT NULL
);


--
-- Name: group_teacher; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE group_teacher (
    group_id integer NOT NULL,
    user_id integer NOT NULL
);


--
-- Name: groups; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE groups (
    id integer NOT NULL,
    semester_id integer NOT NULL,
    subject_id integer NOT NULL,
    level_id integer NOT NULL,
    deleted_at timestamp(0) without time zone,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


--
-- Name: groups_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE groups_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- Name: groups_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE groups_id_seq OWNED BY groups.id;


--
-- Name: levels; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE levels (
    id integer NOT NULL,
    name character varying(255) NOT NULL,
    deleted_at timestamp(0) without time zone,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


--
-- Name: levels_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE levels_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- Name: levels_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE levels_id_seq OWNED BY levels.id;


--
-- Name: migrations; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE migrations (
    id integer NOT NULL,
    migration character varying(255) NOT NULL,
    batch integer NOT NULL
);


--
-- Name: migrations_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE migrations_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- Name: migrations_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE migrations_id_seq OWNED BY migrations.id;


--
-- Name: partials; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE partials (
    id integer NOT NULL,
    name character varying(255) NOT NULL,
    "order" integer NOT NULL,
    is_final integer DEFAULT 0 NOT NULL,
    semester_id integer NOT NULL,
    deleted_at timestamp(0) without time zone,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


--
-- Name: partials_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE partials_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- Name: partials_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE partials_id_seq OWNED BY partials.id;


--
-- Name: password_resets; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE password_resets (
    email character varying(255) NOT NULL,
    token character varying(255) NOT NULL,
    created_at timestamp(0) without time zone
);


--
-- Name: permission_role; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE permission_role (
    permission_id integer NOT NULL,
    role_id integer NOT NULL
);


--
-- Name: permissions; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE permissions (
    id integer NOT NULL,
    name character varying(255) NOT NULL,
    display_name character varying(255),
    description character varying(255),
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


--
-- Name: permissions_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE permissions_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- Name: permissions_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE permissions_id_seq OWNED BY permissions.id;


--
-- Name: role_user; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE role_user (
    user_id integer NOT NULL,
    role_id integer NOT NULL
);


--
-- Name: roles; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE roles (
    id integer NOT NULL,
    name character varying(255) NOT NULL,
    display_name character varying(255),
    description character varying(255),
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


--
-- Name: roles_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE roles_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- Name: roles_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE roles_id_seq OWNED BY roles.id;


--
-- Name: semesters; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE semesters (
    id integer NOT NULL,
    name character varying(255) NOT NULL,
    deleted_at timestamp(0) without time zone,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


--
-- Name: semesters_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE semesters_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- Name: semesters_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE semesters_id_seq OWNED BY semesters.id;


--
-- Name: subjects; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE subjects (
    id integer NOT NULL,
    name character varying(255) NOT NULL,
    deleted_at timestamp(0) without time zone,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


--
-- Name: subjects_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE subjects_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- Name: subjects_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE subjects_id_seq OWNED BY subjects.id;


--
-- Name: users; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE users (
    id integer NOT NULL,
    enrollment text,
    name character varying(255) NOT NULL,
    username character varying(255) NOT NULL,
    password character varying(255) NOT NULL,
    level_id integer,
    remember_token character varying(100),
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    deleted_at timestamp(0) without time zone
);


--
-- Name: users_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE users_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- Name: users_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE users_id_seq OWNED BY users.id;


--
-- Name: cualitative_grades id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY cualitative_grades ALTER COLUMN id SET DEFAULT nextval('cualitative_grades_id_seq'::regclass);


--
-- Name: grades id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY grades ALTER COLUMN id SET DEFAULT nextval('grades_id_seq'::regclass);


--
-- Name: groups id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY groups ALTER COLUMN id SET DEFAULT nextval('groups_id_seq'::regclass);


--
-- Name: levels id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY levels ALTER COLUMN id SET DEFAULT nextval('levels_id_seq'::regclass);


--
-- Name: migrations id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY migrations ALTER COLUMN id SET DEFAULT nextval('migrations_id_seq'::regclass);


--
-- Name: partials id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY partials ALTER COLUMN id SET DEFAULT nextval('partials_id_seq'::regclass);


--
-- Name: permissions id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY permissions ALTER COLUMN id SET DEFAULT nextval('permissions_id_seq'::regclass);


--
-- Name: roles id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY roles ALTER COLUMN id SET DEFAULT nextval('roles_id_seq'::regclass);


--
-- Name: semesters id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY semesters ALTER COLUMN id SET DEFAULT nextval('semesters_id_seq'::regclass);


--
-- Name: subjects id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY subjects ALTER COLUMN id SET DEFAULT nextval('subjects_id_seq'::regclass);


--
-- Name: users id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY users ALTER COLUMN id SET DEFAULT nextval('users_id_seq'::regclass);


--
-- Data for Name: cualitative_grades; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO cualitative_grades (id, name, "order", deleted_at, created_at, updated_at) VALUES (1, 'No logrado', 1, NULL, NULL, NULL);
INSERT INTO cualitative_grades (id, name, "order", deleted_at, created_at, updated_at) VALUES (2, 'En proceso', 2, NULL, NULL, NULL);
INSERT INTO cualitative_grades (id, name, "order", deleted_at, created_at, updated_at) VALUES (3, 'Regular', 3, NULL, NULL, NULL);
INSERT INTO cualitative_grades (id, name, "order", deleted_at, created_at, updated_at) VALUES (4, 'Bien', 4, NULL, NULL, NULL);
INSERT INTO cualitative_grades (id, name, "order", deleted_at, created_at, updated_at) VALUES (5, 'Muy bien', 5, NULL, NULL, NULL);
INSERT INTO cualitative_grades (id, name, "order", deleted_at, created_at, updated_at) VALUES (6, 'Excelente', 6, NULL, NULL, NULL);


--
-- Name: cualitative_grades_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('cualitative_grades_id_seq', 6, true);


--
-- Data for Name: grades; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO grades (id, student_id, group_id, partial_id, comments, cuantitative, participation, punctuality, working_disposition, homework, deleted_at, created_at, updated_at) VALUES (3, 11, 14, 1, NULL, 100.00, 6, 6, 6, 6, NULL, '2018-02-19 18:33:46', '2018-02-19 18:33:46');
INSERT INTO grades (id, student_id, group_id, partial_id, comments, cuantitative, participation, punctuality, working_disposition, homework, deleted_at, created_at, updated_at) VALUES (4, 34, 12, 2, NULL, NULL, 6, 6, 6, 6, NULL, '2018-02-19 19:40:56', '2018-02-19 19:40:56');
INSERT INTO grades (id, student_id, group_id, partial_id, comments, cuantitative, participation, punctuality, working_disposition, homework, deleted_at, created_at, updated_at) VALUES (5, 32, 23, 1, NULL, 80.00, 6, 6, 6, 6, NULL, '2018-02-20 14:14:47', '2018-02-20 14:14:47');
INSERT INTO grades (id, student_id, group_id, partial_id, comments, cuantitative, participation, punctuality, working_disposition, homework, deleted_at, created_at, updated_at) VALUES (6, 40, 32, 1, NULL, 92.00, 6, 6, 4, 6, NULL, '2018-02-20 18:59:08', '2018-02-20 18:59:08');
INSERT INTO grades (id, student_id, group_id, partial_id, comments, cuantitative, participation, punctuality, working_disposition, homework, deleted_at, created_at, updated_at) VALUES (7, 49, 32, 1, NULL, 100.00, 6, 6, 6, 6, NULL, '2018-02-20 18:59:57', '2018-02-20 18:59:57');
INSERT INTO grades (id, student_id, group_id, partial_id, comments, cuantitative, participation, punctuality, working_disposition, homework, deleted_at, created_at, updated_at) VALUES (8, 48, 32, 1, NULL, 80.00, 6, 6, 6, 1, NULL, '2018-02-20 19:00:18', '2018-02-20 19:00:18');
INSERT INTO grades (id, student_id, group_id, partial_id, comments, cuantitative, participation, punctuality, working_disposition, homework, deleted_at, created_at, updated_at) VALUES (9, 29, 32, 1, NULL, 94.00, 5, 5, 5, 6, NULL, '2018-02-20 19:00:43', '2018-02-20 19:00:43');
INSERT INTO grades (id, student_id, group_id, partial_id, comments, cuantitative, participation, punctuality, working_disposition, homework, deleted_at, created_at, updated_at) VALUES (10, 53, 32, 1, NULL, 98.00, 5, 6, 6, 6, NULL, '2018-02-20 19:01:14', '2018-02-20 19:01:14');
INSERT INTO grades (id, student_id, group_id, partial_id, comments, cuantitative, participation, punctuality, working_disposition, homework, deleted_at, created_at, updated_at) VALUES (11, 57, 32, 1, NULL, NULL, 1, 1, 1, 1, NULL, '2018-02-20 19:01:57', '2018-02-20 19:01:57');
INSERT INTO grades (id, student_id, group_id, partial_id, comments, cuantitative, participation, punctuality, working_disposition, homework, deleted_at, created_at, updated_at) VALUES (12, 44, 32, 1, NULL, 90.00, 5, 6, 4, 6, NULL, '2018-02-20 19:02:30', '2018-02-20 19:02:30');
INSERT INTO grades (id, student_id, group_id, partial_id, comments, cuantitative, participation, punctuality, working_disposition, homework, deleted_at, created_at, updated_at) VALUES (13, 31, 32, 1, NULL, 82.00, 3, 6, 5, 1, NULL, '2018-02-20 19:03:11', '2018-02-20 19:03:11');
INSERT INTO grades (id, student_id, group_id, partial_id, comments, cuantitative, participation, punctuality, working_disposition, homework, deleted_at, created_at, updated_at) VALUES (14, 47, 32, 1, NULL, 100.00, 6, 6, 6, 6, NULL, '2018-02-20 19:03:29', '2018-02-20 19:03:29');
INSERT INTO grades (id, student_id, group_id, partial_id, comments, cuantitative, participation, punctuality, working_disposition, homework, deleted_at, created_at, updated_at) VALUES (15, 69, 32, 1, NULL, 93.00, 6, 5, 6, 1, NULL, '2018-02-20 19:03:56', '2018-02-20 19:03:56');
INSERT INTO grades (id, student_id, group_id, partial_id, comments, cuantitative, participation, punctuality, working_disposition, homework, deleted_at, created_at, updated_at) VALUES (16, 38, 32, 1, NULL, 100.00, 6, 6, 6, 6, NULL, '2018-02-20 19:04:16', '2018-02-20 19:04:16');
INSERT INTO grades (id, student_id, group_id, partial_id, comments, cuantitative, participation, punctuality, working_disposition, homework, deleted_at, created_at, updated_at) VALUES (17, 55, 32, 1, NULL, 94.00, 6, 4, 6, 6, NULL, '2018-02-20 19:04:39', '2018-02-20 19:04:39');
INSERT INTO grades (id, student_id, group_id, partial_id, comments, cuantitative, participation, punctuality, working_disposition, homework, deleted_at, created_at, updated_at) VALUES (18, 32, 32, 1, NULL, 86.00, 4, 6, 6, 3, NULL, '2018-02-20 19:05:07', '2018-02-20 19:05:07');
INSERT INTO grades (id, student_id, group_id, partial_id, comments, cuantitative, participation, punctuality, working_disposition, homework, deleted_at, created_at, updated_at) VALUES (19, 27, 32, 1, NULL, 95.00, 6, 6, 6, 6, NULL, '2018-02-20 19:05:39', '2018-02-20 19:05:39');
INSERT INTO grades (id, student_id, group_id, partial_id, comments, cuantitative, participation, punctuality, working_disposition, homework, deleted_at, created_at, updated_at) VALUES (20, 66, 32, 1, NULL, 96.00, 5, 6, 6, 6, NULL, '2018-02-20 19:06:00', '2018-02-20 19:06:00');
INSERT INTO grades (id, student_id, group_id, partial_id, comments, cuantitative, participation, punctuality, working_disposition, homework, deleted_at, created_at, updated_at) VALUES (21, 67, 32, 1, NULL, 93.00, 6, 6, 6, 3, NULL, '2018-02-20 19:06:15', '2018-02-20 19:06:15');
INSERT INTO grades (id, student_id, group_id, partial_id, comments, cuantitative, participation, punctuality, working_disposition, homework, deleted_at, created_at, updated_at) VALUES (22, 41, 32, 1, NULL, 100.00, 6, 6, 6, 6, NULL, '2018-02-20 19:06:30', '2018-02-20 19:06:30');
INSERT INTO grades (id, student_id, group_id, partial_id, comments, cuantitative, participation, punctuality, working_disposition, homework, deleted_at, created_at, updated_at) VALUES (23, 32, 4, 1, NULL, 84.00, 2, 5, 4, 3, NULL, '2018-02-21 17:45:25', '2018-02-21 17:45:25');
INSERT INTO grades (id, student_id, group_id, partial_id, comments, cuantitative, participation, punctuality, working_disposition, homework, deleted_at, created_at, updated_at) VALUES (24, 42, 4, 1, NULL, 85.00, 3, 2, 3, 3, NULL, '2018-02-21 17:50:53', '2018-02-21 17:50:53');
INSERT INTO grades (id, student_id, group_id, partial_id, comments, cuantitative, participation, punctuality, working_disposition, homework, deleted_at, created_at, updated_at) VALUES (25, 4, 18, 1, 'Siempre dispuesta a trabajar con orden y rapidez.', 91.00, 6, 6, 6, 5, NULL, '2018-02-21 19:10:03', '2018-02-21 19:10:03');
INSERT INTO grades (id, student_id, group_id, partial_id, comments, cuantitative, participation, punctuality, working_disposition, homework, deleted_at, created_at, updated_at) VALUES (26, 7, 18, 1, 'Siempre participativa en clase.', 99.00, 6, 6, 6, 6, NULL, '2018-02-21 19:13:21', '2018-02-21 19:13:21');
INSERT INTO grades (id, student_id, group_id, partial_id, comments, cuantitative, participation, punctuality, working_disposition, homework, deleted_at, created_at, updated_at) VALUES (27, 10, 18, 1, 'Falta con sus tareas.', 76.00, 3, 2, 4, 2, NULL, '2018-02-21 19:19:56', '2018-02-21 19:19:56');
INSERT INTO grades (id, student_id, group_id, partial_id, comments, cuantitative, participation, punctuality, working_disposition, homework, deleted_at, created_at, updated_at) VALUES (28, 12, 18, 1, 'Hay que trabajar la rapidez con que hace sus trabajos.', 84.00, 5, 6, 6, 4, NULL, '2018-02-21 19:22:33', '2018-02-21 19:22:33');
INSERT INTO grades (id, student_id, group_id, partial_id, comments, cuantitative, participation, punctuality, working_disposition, homework, deleted_at, created_at, updated_at) VALUES (30, 16, 18, 1, 'Trabaja muy bien dentro del salón y es muy participativa en las actividades.', 100.00, 6, 6, 6, 6, NULL, '2018-02-21 19:28:45', '2018-02-21 19:28:45');
INSERT INTO grades (id, student_id, group_id, partial_id, comments, cuantitative, participation, punctuality, working_disposition, homework, deleted_at, created_at, updated_at) VALUES (31, 20, 18, 1, 'Trabaja muy bien dentro de clase y es muy participativo.', 100.00, 6, 6, 6, 6, NULL, '2018-02-21 19:30:21', '2018-02-21 19:30:21');
INSERT INTO grades (id, student_id, group_id, partial_id, comments, cuantitative, participation, punctuality, working_disposition, homework, deleted_at, created_at, updated_at) VALUES (32, 17, 18, 1, 'N/A el alumno no asiste a clase ya que sólo viene los lunes.', NULL, 6, 6, 6, 6, NULL, '2018-02-21 19:32:20', '2018-02-21 19:32:20');
INSERT INTO grades (id, student_id, group_id, partial_id, comments, cuantitative, participation, punctuality, working_disposition, homework, deleted_at, created_at, updated_at) VALUES (29, 13, 18, 1, 'Hay que trabajar en la entrega de tareas, sin embargo es participativo y trabaja bien en clase.', 80.00, 5, 5, 6, 2, NULL, '2018-02-21 19:27:22', '2018-02-21 19:39:59');
INSERT INTO grades (id, student_id, group_id, partial_id, comments, cuantitative, participation, punctuality, working_disposition, homework, deleted_at, created_at, updated_at) VALUES (33, 25, 19, 1, 'N/A la alumna sólo viene los lunes.', NULL, 6, 6, 6, 6, NULL, '2018-02-21 19:42:36', '2018-02-21 19:42:36');
INSERT INTO grades (id, student_id, group_id, partial_id, comments, cuantitative, participation, punctuality, working_disposition, homework, deleted_at, created_at, updated_at) VALUES (34, 8, 19, 1, 'Muy participativa en clase, cumple con sus tareas.', 100.00, 6, 6, 6, 6, NULL, '2018-02-21 19:45:30', '2018-02-21 19:45:30');
INSERT INTO grades (id, student_id, group_id, partial_id, comments, cuantitative, participation, punctuality, working_disposition, homework, deleted_at, created_at, updated_at) VALUES (35, 11, 19, 1, 'Hay que trabajar en la entrega de tareas.', 89.00, 5, 5, 6, 2, NULL, '2018-02-21 19:54:07', '2018-02-21 19:54:07');
INSERT INTO grades (id, student_id, group_id, partial_id, comments, cuantitative, participation, punctuality, working_disposition, homework, deleted_at, created_at, updated_at) VALUES (36, 18, 19, 1, 'N/A La alumna sólo viene a clase de teatro.', NULL, 6, 6, 6, 6, NULL, '2018-02-21 19:54:55', '2018-02-21 19:54:55');
INSERT INTO grades (id, student_id, group_id, partial_id, comments, cuantitative, participation, punctuality, working_disposition, homework, deleted_at, created_at, updated_at) VALUES (37, 22, 19, 1, 'N/A El alumno sólo viene los lunes.', NULL, 6, 6, 6, 6, NULL, '2018-02-21 19:55:24', '2018-02-21 19:55:24');
INSERT INTO grades (id, student_id, group_id, partial_id, comments, cuantitative, participation, punctuality, working_disposition, homework, deleted_at, created_at, updated_at) VALUES (38, 9, 19, 1, 'Trabaja muy bien y con rapidez en clase.', 93.00, 5, 6, 6, 5, NULL, '2018-02-21 20:01:21', '2018-02-21 20:01:21');
INSERT INTO grades (id, student_id, group_id, partial_id, comments, cuantitative, participation, punctuality, working_disposition, homework, deleted_at, created_at, updated_at) VALUES (39, 24, 19, 1, 'Hay que trabajar en la entrega de tareas.', 89.00, 6, 6, 6, 4, NULL, '2018-02-21 20:04:10', '2018-02-21 20:04:10');
INSERT INTO grades (id, student_id, group_id, partial_id, comments, cuantitative, participation, punctuality, working_disposition, homework, deleted_at, created_at, updated_at) VALUES (40, 14, 19, 1, 'Muy participativa en clase, cumple con sus tareas.', 94.00, 6, 6, 6, 6, NULL, '2018-02-21 20:06:30', '2018-02-21 20:06:30');
INSERT INTO grades (id, student_id, group_id, partial_id, comments, cuantitative, participation, punctuality, working_disposition, homework, deleted_at, created_at, updated_at) VALUES (41, 15, 19, 1, 'Trabaja muy bien en clase, cumple con sus tareas.', 100.00, 6, 6, 6, 6, NULL, '2018-02-21 20:07:38', '2018-02-21 20:07:38');
INSERT INTO grades (id, student_id, group_id, partial_id, comments, cuantitative, participation, punctuality, working_disposition, homework, deleted_at, created_at, updated_at) VALUES (42, 6, 19, 1, 'Muy participativa en clase, trabaja muy bien dentro del salón.', 97.00, 6, 6, 6, 5, NULL, '2018-02-21 20:09:21', '2018-02-21 20:09:21');
INSERT INTO grades (id, student_id, group_id, partial_id, comments, cuantitative, participation, punctuality, working_disposition, homework, deleted_at, created_at, updated_at) VALUES (43, 19, 19, 1, 'Se está trabajando en la entrega de tareas por las faltas que tenía no las pudo entregar.', 90.00, 6, 6, 6, 2, NULL, '2018-02-21 20:11:37', '2018-02-21 20:11:37');
INSERT INTO grades (id, student_id, group_id, partial_id, comments, cuantitative, participation, punctuality, working_disposition, homework, deleted_at, created_at, updated_at) VALUES (44, 5, 19, 1, 'Muy participativa en clase, trabaja muy bien dentro del salón.', 100.00, 6, 6, 6, 6, NULL, '2018-02-21 20:12:45', '2018-02-21 20:12:45');
INSERT INTO grades (id, student_id, group_id, partial_id, comments, cuantitative, participation, punctuality, working_disposition, homework, deleted_at, created_at, updated_at) VALUES (45, 21, 19, 1, 'N/A El alumno sólo viene los lunes.', NULL, 6, 6, 6, 6, NULL, '2018-02-21 20:15:29', '2018-02-21 20:15:29');
INSERT INTO grades (id, student_id, group_id, partial_id, comments, cuantitative, participation, punctuality, working_disposition, homework, deleted_at, created_at, updated_at) VALUES (46, 23, 19, 1, 'N/A La alumna sólo viene los lunes.', NULL, 6, 6, 6, 6, NULL, '2018-02-21 20:17:46', '2018-02-21 20:17:46');


--
-- Name: grades_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('grades_id_seq', 46, true);


--
-- Data for Name: group_student; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO group_student (group_id, user_id) VALUES (6, 43);
INSERT INTO group_student (group_id, user_id) VALUES (9, 43);
INSERT INTO group_student (group_id, user_id) VALUES (13, 43);
INSERT INTO group_student (group_id, user_id) VALUES (17, 43);
INSERT INTO group_student (group_id, user_id) VALUES (22, 43);
INSERT INTO group_student (group_id, user_id) VALUES (28, 43);
INSERT INTO group_student (group_id, user_id) VALUES (31, 43);
INSERT INTO group_student (group_id, user_id) VALUES (34, 43);
INSERT INTO group_student (group_id, user_id) VALUES (41, 43);
INSERT INTO group_student (group_id, user_id) VALUES (48, 43);
INSERT INTO group_student (group_id, user_id) VALUES (11, 25);
INSERT INTO group_student (group_id, user_id) VALUES (14, 25);
INSERT INTO group_student (group_id, user_id) VALUES (19, 25);
INSERT INTO group_student (group_id, user_id) VALUES (36, 25);
INSERT INTO group_student (group_id, user_id) VALUES (38, 25);
INSERT INTO group_student (group_id, user_id) VALUES (43, 25);
INSERT INTO group_student (group_id, user_id) VALUES (45, 25);
INSERT INTO group_student (group_id, user_id) VALUES (50, 25);
INSERT INTO group_student (group_id, user_id) VALUES (52, 25);
INSERT INTO group_student (group_id, user_id) VALUES (4, 32);
INSERT INTO group_student (group_id, user_id) VALUES (7, 32);
INSERT INTO group_student (group_id, user_id) VALUES (15, 32);
INSERT INTO group_student (group_id, user_id) VALUES (20, 32);
INSERT INTO group_student (group_id, user_id) VALUES (23, 32);
INSERT INTO group_student (group_id, user_id) VALUES (26, 32);
INSERT INTO group_student (group_id, user_id) VALUES (29, 32);
INSERT INTO group_student (group_id, user_id) VALUES (32, 32);
INSERT INTO group_student (group_id, user_id) VALUES (39, 32);
INSERT INTO group_student (group_id, user_id) VALUES (46, 32);
INSERT INTO group_student (group_id, user_id) VALUES (11, 8);
INSERT INTO group_student (group_id, user_id) VALUES (14, 8);
INSERT INTO group_student (group_id, user_id) VALUES (19, 8);
INSERT INTO group_student (group_id, user_id) VALUES (36, 8);
INSERT INTO group_student (group_id, user_id) VALUES (38, 8);
INSERT INTO group_student (group_id, user_id) VALUES (43, 8);
INSERT INTO group_student (group_id, user_id) VALUES (45, 8);
INSERT INTO group_student (group_id, user_id) VALUES (50, 8);
INSERT INTO group_student (group_id, user_id) VALUES (52, 8);
INSERT INTO group_student (group_id, user_id) VALUES (10, 12);
INSERT INTO group_student (group_id, user_id) VALUES (18, 12);
INSERT INTO group_student (group_id, user_id) VALUES (25, 12);
INSERT INTO group_student (group_id, user_id) VALUES (35, 12);
INSERT INTO group_student (group_id, user_id) VALUES (37, 12);
INSERT INTO group_student (group_id, user_id) VALUES (42, 12);
INSERT INTO group_student (group_id, user_id) VALUES (44, 12);
INSERT INTO group_student (group_id, user_id) VALUES (49, 12);
INSERT INTO group_student (group_id, user_id) VALUES (51, 12);
INSERT INTO group_student (group_id, user_id) VALUES (5, 58);
INSERT INTO group_student (group_id, user_id) VALUES (8, 58);
INSERT INTO group_student (group_id, user_id) VALUES (12, 58);
INSERT INTO group_student (group_id, user_id) VALUES (16, 58);
INSERT INTO group_student (group_id, user_id) VALUES (21, 58);
INSERT INTO group_student (group_id, user_id) VALUES (24, 58);
INSERT INTO group_student (group_id, user_id) VALUES (27, 58);
INSERT INTO group_student (group_id, user_id) VALUES (30, 58);
INSERT INTO group_student (group_id, user_id) VALUES (33, 58);
INSERT INTO group_student (group_id, user_id) VALUES (40, 58);
INSERT INTO group_student (group_id, user_id) VALUES (47, 58);
INSERT INTO group_student (group_id, user_id) VALUES (10, 10);
INSERT INTO group_student (group_id, user_id) VALUES (18, 10);
INSERT INTO group_student (group_id, user_id) VALUES (25, 10);
INSERT INTO group_student (group_id, user_id) VALUES (35, 10);
INSERT INTO group_student (group_id, user_id) VALUES (37, 10);
INSERT INTO group_student (group_id, user_id) VALUES (42, 10);
INSERT INTO group_student (group_id, user_id) VALUES (44, 10);
INSERT INTO group_student (group_id, user_id) VALUES (49, 10);
INSERT INTO group_student (group_id, user_id) VALUES (51, 10);
INSERT INTO group_student (group_id, user_id) VALUES (5, 26);
INSERT INTO group_student (group_id, user_id) VALUES (8, 26);
INSERT INTO group_student (group_id, user_id) VALUES (12, 26);
INSERT INTO group_student (group_id, user_id) VALUES (16, 26);
INSERT INTO group_student (group_id, user_id) VALUES (21, 26);
INSERT INTO group_student (group_id, user_id) VALUES (24, 26);
INSERT INTO group_student (group_id, user_id) VALUES (27, 26);
INSERT INTO group_student (group_id, user_id) VALUES (30, 26);
INSERT INTO group_student (group_id, user_id) VALUES (33, 26);
INSERT INTO group_student (group_id, user_id) VALUES (40, 26);
INSERT INTO group_student (group_id, user_id) VALUES (47, 26);
INSERT INTO group_student (group_id, user_id) VALUES (4, 42);
INSERT INTO group_student (group_id, user_id) VALUES (7, 42);
INSERT INTO group_student (group_id, user_id) VALUES (15, 42);
INSERT INTO group_student (group_id, user_id) VALUES (20, 42);
INSERT INTO group_student (group_id, user_id) VALUES (23, 42);
INSERT INTO group_student (group_id, user_id) VALUES (26, 42);
INSERT INTO group_student (group_id, user_id) VALUES (29, 42);
INSERT INTO group_student (group_id, user_id) VALUES (32, 42);
INSERT INTO group_student (group_id, user_id) VALUES (39, 42);
INSERT INTO group_student (group_id, user_id) VALUES (46, 42);
INSERT INTO group_student (group_id, user_id) VALUES (11, 11);
INSERT INTO group_student (group_id, user_id) VALUES (14, 11);
INSERT INTO group_student (group_id, user_id) VALUES (19, 11);
INSERT INTO group_student (group_id, user_id) VALUES (36, 11);
INSERT INTO group_student (group_id, user_id) VALUES (38, 11);
INSERT INTO group_student (group_id, user_id) VALUES (43, 11);
INSERT INTO group_student (group_id, user_id) VALUES (45, 11);
INSERT INTO group_student (group_id, user_id) VALUES (50, 11);
INSERT INTO group_student (group_id, user_id) VALUES (52, 11);
INSERT INTO group_student (group_id, user_id) VALUES (11, 18);
INSERT INTO group_student (group_id, user_id) VALUES (14, 18);
INSERT INTO group_student (group_id, user_id) VALUES (19, 18);
INSERT INTO group_student (group_id, user_id) VALUES (36, 18);
INSERT INTO group_student (group_id, user_id) VALUES (38, 18);
INSERT INTO group_student (group_id, user_id) VALUES (43, 18);
INSERT INTO group_student (group_id, user_id) VALUES (45, 18);
INSERT INTO group_student (group_id, user_id) VALUES (50, 18);
INSERT INTO group_student (group_id, user_id) VALUES (52, 18);
INSERT INTO group_student (group_id, user_id) VALUES (6, 59);
INSERT INTO group_student (group_id, user_id) VALUES (9, 59);
INSERT INTO group_student (group_id, user_id) VALUES (13, 59);
INSERT INTO group_student (group_id, user_id) VALUES (17, 59);
INSERT INTO group_student (group_id, user_id) VALUES (22, 59);
INSERT INTO group_student (group_id, user_id) VALUES (28, 59);
INSERT INTO group_student (group_id, user_id) VALUES (31, 59);
INSERT INTO group_student (group_id, user_id) VALUES (34, 59);
INSERT INTO group_student (group_id, user_id) VALUES (41, 59);
INSERT INTO group_student (group_id, user_id) VALUES (48, 59);
INSERT INTO group_student (group_id, user_id) VALUES (10, 16);
INSERT INTO group_student (group_id, user_id) VALUES (18, 16);
INSERT INTO group_student (group_id, user_id) VALUES (25, 16);
INSERT INTO group_student (group_id, user_id) VALUES (35, 16);
INSERT INTO group_student (group_id, user_id) VALUES (37, 16);
INSERT INTO group_student (group_id, user_id) VALUES (42, 16);
INSERT INTO group_student (group_id, user_id) VALUES (44, 16);
INSERT INTO group_student (group_id, user_id) VALUES (49, 16);
INSERT INTO group_student (group_id, user_id) VALUES (51, 16);
INSERT INTO group_student (group_id, user_id) VALUES (6, 39);
INSERT INTO group_student (group_id, user_id) VALUES (9, 39);
INSERT INTO group_student (group_id, user_id) VALUES (13, 39);
INSERT INTO group_student (group_id, user_id) VALUES (17, 39);
INSERT INTO group_student (group_id, user_id) VALUES (22, 39);
INSERT INTO group_student (group_id, user_id) VALUES (28, 39);
INSERT INTO group_student (group_id, user_id) VALUES (31, 39);
INSERT INTO group_student (group_id, user_id) VALUES (34, 39);
INSERT INTO group_student (group_id, user_id) VALUES (41, 39);
INSERT INTO group_student (group_id, user_id) VALUES (48, 39);
INSERT INTO group_student (group_id, user_id) VALUES (6, 54);
INSERT INTO group_student (group_id, user_id) VALUES (9, 54);
INSERT INTO group_student (group_id, user_id) VALUES (13, 54);
INSERT INTO group_student (group_id, user_id) VALUES (17, 54);
INSERT INTO group_student (group_id, user_id) VALUES (22, 54);
INSERT INTO group_student (group_id, user_id) VALUES (28, 54);
INSERT INTO group_student (group_id, user_id) VALUES (31, 54);
INSERT INTO group_student (group_id, user_id) VALUES (34, 54);
INSERT INTO group_student (group_id, user_id) VALUES (41, 54);
INSERT INTO group_student (group_id, user_id) VALUES (48, 54);
INSERT INTO group_student (group_id, user_id) VALUES (4, 47);
INSERT INTO group_student (group_id, user_id) VALUES (7, 47);
INSERT INTO group_student (group_id, user_id) VALUES (15, 47);
INSERT INTO group_student (group_id, user_id) VALUES (20, 47);
INSERT INTO group_student (group_id, user_id) VALUES (23, 47);
INSERT INTO group_student (group_id, user_id) VALUES (26, 47);
INSERT INTO group_student (group_id, user_id) VALUES (29, 47);
INSERT INTO group_student (group_id, user_id) VALUES (32, 47);
INSERT INTO group_student (group_id, user_id) VALUES (39, 47);
INSERT INTO group_student (group_id, user_id) VALUES (46, 47);
INSERT INTO group_student (group_id, user_id) VALUES (5, 61);
INSERT INTO group_student (group_id, user_id) VALUES (8, 61);
INSERT INTO group_student (group_id, user_id) VALUES (12, 61);
INSERT INTO group_student (group_id, user_id) VALUES (16, 61);
INSERT INTO group_student (group_id, user_id) VALUES (21, 61);
INSERT INTO group_student (group_id, user_id) VALUES (24, 61);
INSERT INTO group_student (group_id, user_id) VALUES (27, 61);
INSERT INTO group_student (group_id, user_id) VALUES (30, 61);
INSERT INTO group_student (group_id, user_id) VALUES (33, 61);
INSERT INTO group_student (group_id, user_id) VALUES (40, 61);
INSERT INTO group_student (group_id, user_id) VALUES (47, 61);
INSERT INTO group_student (group_id, user_id) VALUES (10, 13);
INSERT INTO group_student (group_id, user_id) VALUES (18, 13);
INSERT INTO group_student (group_id, user_id) VALUES (25, 13);
INSERT INTO group_student (group_id, user_id) VALUES (35, 13);
INSERT INTO group_student (group_id, user_id) VALUES (37, 13);
INSERT INTO group_student (group_id, user_id) VALUES (42, 13);
INSERT INTO group_student (group_id, user_id) VALUES (44, 13);
INSERT INTO group_student (group_id, user_id) VALUES (49, 13);
INSERT INTO group_student (group_id, user_id) VALUES (51, 13);
INSERT INTO group_student (group_id, user_id) VALUES (4, 49);
INSERT INTO group_student (group_id, user_id) VALUES (7, 49);
INSERT INTO group_student (group_id, user_id) VALUES (15, 49);
INSERT INTO group_student (group_id, user_id) VALUES (20, 49);
INSERT INTO group_student (group_id, user_id) VALUES (23, 49);
INSERT INTO group_student (group_id, user_id) VALUES (26, 49);
INSERT INTO group_student (group_id, user_id) VALUES (29, 49);
INSERT INTO group_student (group_id, user_id) VALUES (32, 49);
INSERT INTO group_student (group_id, user_id) VALUES (39, 49);
INSERT INTO group_student (group_id, user_id) VALUES (46, 49);
INSERT INTO group_student (group_id, user_id) VALUES (11, 22);
INSERT INTO group_student (group_id, user_id) VALUES (14, 22);
INSERT INTO group_student (group_id, user_id) VALUES (19, 22);
INSERT INTO group_student (group_id, user_id) VALUES (36, 22);
INSERT INTO group_student (group_id, user_id) VALUES (38, 22);
INSERT INTO group_student (group_id, user_id) VALUES (43, 22);
INSERT INTO group_student (group_id, user_id) VALUES (45, 22);
INSERT INTO group_student (group_id, user_id) VALUES (50, 22);
INSERT INTO group_student (group_id, user_id) VALUES (52, 22);
INSERT INTO group_student (group_id, user_id) VALUES (6, 63);
INSERT INTO group_student (group_id, user_id) VALUES (9, 63);
INSERT INTO group_student (group_id, user_id) VALUES (13, 63);
INSERT INTO group_student (group_id, user_id) VALUES (17, 63);
INSERT INTO group_student (group_id, user_id) VALUES (22, 63);
INSERT INTO group_student (group_id, user_id) VALUES (28, 63);
INSERT INTO group_student (group_id, user_id) VALUES (31, 63);
INSERT INTO group_student (group_id, user_id) VALUES (34, 63);
INSERT INTO group_student (group_id, user_id) VALUES (41, 63);
INSERT INTO group_student (group_id, user_id) VALUES (48, 63);
INSERT INTO group_student (group_id, user_id) VALUES (11, 9);
INSERT INTO group_student (group_id, user_id) VALUES (14, 9);
INSERT INTO group_student (group_id, user_id) VALUES (19, 9);
INSERT INTO group_student (group_id, user_id) VALUES (36, 9);
INSERT INTO group_student (group_id, user_id) VALUES (38, 9);
INSERT INTO group_student (group_id, user_id) VALUES (43, 9);
INSERT INTO group_student (group_id, user_id) VALUES (45, 9);
INSERT INTO group_student (group_id, user_id) VALUES (50, 9);
INSERT INTO group_student (group_id, user_id) VALUES (52, 9);
INSERT INTO group_student (group_id, user_id) VALUES (4, 67);
INSERT INTO group_student (group_id, user_id) VALUES (7, 67);
INSERT INTO group_student (group_id, user_id) VALUES (15, 67);
INSERT INTO group_student (group_id, user_id) VALUES (20, 67);
INSERT INTO group_student (group_id, user_id) VALUES (23, 67);
INSERT INTO group_student (group_id, user_id) VALUES (26, 67);
INSERT INTO group_student (group_id, user_id) VALUES (29, 67);
INSERT INTO group_student (group_id, user_id) VALUES (32, 67);
INSERT INTO group_student (group_id, user_id) VALUES (39, 67);
INSERT INTO group_student (group_id, user_id) VALUES (46, 67);
INSERT INTO group_student (group_id, user_id) VALUES (11, 24);
INSERT INTO group_student (group_id, user_id) VALUES (14, 24);
INSERT INTO group_student (group_id, user_id) VALUES (19, 24);
INSERT INTO group_student (group_id, user_id) VALUES (36, 24);
INSERT INTO group_student (group_id, user_id) VALUES (38, 24);
INSERT INTO group_student (group_id, user_id) VALUES (43, 24);
INSERT INTO group_student (group_id, user_id) VALUES (45, 24);
INSERT INTO group_student (group_id, user_id) VALUES (50, 24);
INSERT INTO group_student (group_id, user_id) VALUES (52, 24);
INSERT INTO group_student (group_id, user_id) VALUES (6, 64);
INSERT INTO group_student (group_id, user_id) VALUES (9, 64);
INSERT INTO group_student (group_id, user_id) VALUES (13, 64);
INSERT INTO group_student (group_id, user_id) VALUES (17, 64);
INSERT INTO group_student (group_id, user_id) VALUES (22, 64);
INSERT INTO group_student (group_id, user_id) VALUES (28, 64);
INSERT INTO group_student (group_id, user_id) VALUES (31, 64);
INSERT INTO group_student (group_id, user_id) VALUES (34, 64);
INSERT INTO group_student (group_id, user_id) VALUES (41, 64);
INSERT INTO group_student (group_id, user_id) VALUES (48, 64);
INSERT INTO group_student (group_id, user_id) VALUES (11, 14);
INSERT INTO group_student (group_id, user_id) VALUES (14, 14);
INSERT INTO group_student (group_id, user_id) VALUES (19, 14);
INSERT INTO group_student (group_id, user_id) VALUES (36, 14);
INSERT INTO group_student (group_id, user_id) VALUES (38, 14);
INSERT INTO group_student (group_id, user_id) VALUES (43, 14);
INSERT INTO group_student (group_id, user_id) VALUES (45, 14);
INSERT INTO group_student (group_id, user_id) VALUES (50, 14);
INSERT INTO group_student (group_id, user_id) VALUES (52, 14);
INSERT INTO group_student (group_id, user_id) VALUES (6, 45);
INSERT INTO group_student (group_id, user_id) VALUES (9, 45);
INSERT INTO group_student (group_id, user_id) VALUES (13, 45);
INSERT INTO group_student (group_id, user_id) VALUES (17, 45);
INSERT INTO group_student (group_id, user_id) VALUES (22, 45);
INSERT INTO group_student (group_id, user_id) VALUES (28, 45);
INSERT INTO group_student (group_id, user_id) VALUES (31, 45);
INSERT INTO group_student (group_id, user_id) VALUES (34, 45);
INSERT INTO group_student (group_id, user_id) VALUES (41, 45);
INSERT INTO group_student (group_id, user_id) VALUES (48, 45);
INSERT INTO group_student (group_id, user_id) VALUES (6, 46);
INSERT INTO group_student (group_id, user_id) VALUES (9, 46);
INSERT INTO group_student (group_id, user_id) VALUES (13, 46);
INSERT INTO group_student (group_id, user_id) VALUES (17, 46);
INSERT INTO group_student (group_id, user_id) VALUES (22, 46);
INSERT INTO group_student (group_id, user_id) VALUES (28, 46);
INSERT INTO group_student (group_id, user_id) VALUES (31, 46);
INSERT INTO group_student (group_id, user_id) VALUES (34, 46);
INSERT INTO group_student (group_id, user_id) VALUES (41, 46);
INSERT INTO group_student (group_id, user_id) VALUES (48, 46);
INSERT INTO group_student (group_id, user_id) VALUES (4, 27);
INSERT INTO group_student (group_id, user_id) VALUES (7, 27);
INSERT INTO group_student (group_id, user_id) VALUES (15, 27);
INSERT INTO group_student (group_id, user_id) VALUES (20, 27);
INSERT INTO group_student (group_id, user_id) VALUES (23, 27);
INSERT INTO group_student (group_id, user_id) VALUES (26, 27);
INSERT INTO group_student (group_id, user_id) VALUES (29, 27);
INSERT INTO group_student (group_id, user_id) VALUES (32, 27);
INSERT INTO group_student (group_id, user_id) VALUES (39, 27);
INSERT INTO group_student (group_id, user_id) VALUES (46, 27);
INSERT INTO group_student (group_id, user_id) VALUES (4, 48);
INSERT INTO group_student (group_id, user_id) VALUES (7, 48);
INSERT INTO group_student (group_id, user_id) VALUES (15, 48);
INSERT INTO group_student (group_id, user_id) VALUES (20, 48);
INSERT INTO group_student (group_id, user_id) VALUES (23, 48);
INSERT INTO group_student (group_id, user_id) VALUES (26, 48);
INSERT INTO group_student (group_id, user_id) VALUES (29, 48);
INSERT INTO group_student (group_id, user_id) VALUES (32, 48);
INSERT INTO group_student (group_id, user_id) VALUES (39, 48);
INSERT INTO group_student (group_id, user_id) VALUES (46, 48);
INSERT INTO group_student (group_id, user_id) VALUES (4, 55);
INSERT INTO group_student (group_id, user_id) VALUES (7, 55);
INSERT INTO group_student (group_id, user_id) VALUES (15, 55);
INSERT INTO group_student (group_id, user_id) VALUES (20, 55);
INSERT INTO group_student (group_id, user_id) VALUES (23, 55);
INSERT INTO group_student (group_id, user_id) VALUES (26, 55);
INSERT INTO group_student (group_id, user_id) VALUES (29, 55);
INSERT INTO group_student (group_id, user_id) VALUES (32, 55);
INSERT INTO group_student (group_id, user_id) VALUES (39, 55);
INSERT INTO group_student (group_id, user_id) VALUES (46, 55);
INSERT INTO group_student (group_id, user_id) VALUES (10, 17);
INSERT INTO group_student (group_id, user_id) VALUES (18, 17);
INSERT INTO group_student (group_id, user_id) VALUES (25, 17);
INSERT INTO group_student (group_id, user_id) VALUES (35, 17);
INSERT INTO group_student (group_id, user_id) VALUES (37, 17);
INSERT INTO group_student (group_id, user_id) VALUES (42, 17);
INSERT INTO group_student (group_id, user_id) VALUES (44, 17);
INSERT INTO group_student (group_id, user_id) VALUES (49, 17);
INSERT INTO group_student (group_id, user_id) VALUES (51, 17);
INSERT INTO group_student (group_id, user_id) VALUES (5, 28);
INSERT INTO group_student (group_id, user_id) VALUES (8, 28);
INSERT INTO group_student (group_id, user_id) VALUES (12, 28);
INSERT INTO group_student (group_id, user_id) VALUES (16, 28);
INSERT INTO group_student (group_id, user_id) VALUES (21, 28);
INSERT INTO group_student (group_id, user_id) VALUES (24, 28);
INSERT INTO group_student (group_id, user_id) VALUES (27, 28);
INSERT INTO group_student (group_id, user_id) VALUES (30, 28);
INSERT INTO group_student (group_id, user_id) VALUES (33, 28);
INSERT INTO group_student (group_id, user_id) VALUES (40, 28);
INSERT INTO group_student (group_id, user_id) VALUES (47, 28);
INSERT INTO group_student (group_id, user_id) VALUES (6, 68);
INSERT INTO group_student (group_id, user_id) VALUES (9, 68);
INSERT INTO group_student (group_id, user_id) VALUES (13, 68);
INSERT INTO group_student (group_id, user_id) VALUES (17, 68);
INSERT INTO group_student (group_id, user_id) VALUES (22, 68);
INSERT INTO group_student (group_id, user_id) VALUES (28, 68);
INSERT INTO group_student (group_id, user_id) VALUES (31, 68);
INSERT INTO group_student (group_id, user_id) VALUES (34, 68);
INSERT INTO group_student (group_id, user_id) VALUES (41, 68);
INSERT INTO group_student (group_id, user_id) VALUES (48, 68);
INSERT INTO group_student (group_id, user_id) VALUES (6, 36);
INSERT INTO group_student (group_id, user_id) VALUES (9, 36);
INSERT INTO group_student (group_id, user_id) VALUES (13, 36);
INSERT INTO group_student (group_id, user_id) VALUES (17, 36);
INSERT INTO group_student (group_id, user_id) VALUES (22, 36);
INSERT INTO group_student (group_id, user_id) VALUES (28, 36);
INSERT INTO group_student (group_id, user_id) VALUES (31, 36);
INSERT INTO group_student (group_id, user_id) VALUES (34, 36);
INSERT INTO group_student (group_id, user_id) VALUES (41, 36);
INSERT INTO group_student (group_id, user_id) VALUES (48, 36);
INSERT INTO group_student (group_id, user_id) VALUES (11, 15);
INSERT INTO group_student (group_id, user_id) VALUES (14, 15);
INSERT INTO group_student (group_id, user_id) VALUES (19, 15);
INSERT INTO group_student (group_id, user_id) VALUES (36, 15);
INSERT INTO group_student (group_id, user_id) VALUES (38, 15);
INSERT INTO group_student (group_id, user_id) VALUES (43, 15);
INSERT INTO group_student (group_id, user_id) VALUES (45, 15);
INSERT INTO group_student (group_id, user_id) VALUES (50, 15);
INSERT INTO group_student (group_id, user_id) VALUES (52, 15);
INSERT INTO group_student (group_id, user_id) VALUES (4, 66);
INSERT INTO group_student (group_id, user_id) VALUES (7, 66);
INSERT INTO group_student (group_id, user_id) VALUES (15, 66);
INSERT INTO group_student (group_id, user_id) VALUES (20, 66);
INSERT INTO group_student (group_id, user_id) VALUES (23, 66);
INSERT INTO group_student (group_id, user_id) VALUES (26, 66);
INSERT INTO group_student (group_id, user_id) VALUES (29, 66);
INSERT INTO group_student (group_id, user_id) VALUES (32, 66);
INSERT INTO group_student (group_id, user_id) VALUES (39, 66);
INSERT INTO group_student (group_id, user_id) VALUES (46, 66);
INSERT INTO group_student (group_id, user_id) VALUES (4, 38);
INSERT INTO group_student (group_id, user_id) VALUES (7, 38);
INSERT INTO group_student (group_id, user_id) VALUES (15, 38);
INSERT INTO group_student (group_id, user_id) VALUES (20, 38);
INSERT INTO group_student (group_id, user_id) VALUES (23, 38);
INSERT INTO group_student (group_id, user_id) VALUES (26, 38);
INSERT INTO group_student (group_id, user_id) VALUES (29, 38);
INSERT INTO group_student (group_id, user_id) VALUES (32, 38);
INSERT INTO group_student (group_id, user_id) VALUES (39, 38);
INSERT INTO group_student (group_id, user_id) VALUES (46, 38);
INSERT INTO group_student (group_id, user_id) VALUES (10, 4);
INSERT INTO group_student (group_id, user_id) VALUES (18, 4);
INSERT INTO group_student (group_id, user_id) VALUES (25, 4);
INSERT INTO group_student (group_id, user_id) VALUES (35, 4);
INSERT INTO group_student (group_id, user_id) VALUES (37, 4);
INSERT INTO group_student (group_id, user_id) VALUES (42, 4);
INSERT INTO group_student (group_id, user_id) VALUES (44, 4);
INSERT INTO group_student (group_id, user_id) VALUES (49, 4);
INSERT INTO group_student (group_id, user_id) VALUES (51, 4);
INSERT INTO group_student (group_id, user_id) VALUES (6, 30);
INSERT INTO group_student (group_id, user_id) VALUES (9, 30);
INSERT INTO group_student (group_id, user_id) VALUES (13, 30);
INSERT INTO group_student (group_id, user_id) VALUES (17, 30);
INSERT INTO group_student (group_id, user_id) VALUES (22, 30);
INSERT INTO group_student (group_id, user_id) VALUES (28, 30);
INSERT INTO group_student (group_id, user_id) VALUES (31, 30);
INSERT INTO group_student (group_id, user_id) VALUES (34, 30);
INSERT INTO group_student (group_id, user_id) VALUES (41, 30);
INSERT INTO group_student (group_id, user_id) VALUES (48, 30);
INSERT INTO group_student (group_id, user_id) VALUES (6, 60);
INSERT INTO group_student (group_id, user_id) VALUES (9, 60);
INSERT INTO group_student (group_id, user_id) VALUES (13, 60);
INSERT INTO group_student (group_id, user_id) VALUES (17, 60);
INSERT INTO group_student (group_id, user_id) VALUES (22, 60);
INSERT INTO group_student (group_id, user_id) VALUES (28, 60);
INSERT INTO group_student (group_id, user_id) VALUES (31, 60);
INSERT INTO group_student (group_id, user_id) VALUES (34, 60);
INSERT INTO group_student (group_id, user_id) VALUES (41, 60);
INSERT INTO group_student (group_id, user_id) VALUES (48, 60);
INSERT INTO group_student (group_id, user_id) VALUES (5, 50);
INSERT INTO group_student (group_id, user_id) VALUES (8, 50);
INSERT INTO group_student (group_id, user_id) VALUES (12, 50);
INSERT INTO group_student (group_id, user_id) VALUES (16, 50);
INSERT INTO group_student (group_id, user_id) VALUES (21, 50);
INSERT INTO group_student (group_id, user_id) VALUES (24, 50);
INSERT INTO group_student (group_id, user_id) VALUES (27, 50);
INSERT INTO group_student (group_id, user_id) VALUES (30, 50);
INSERT INTO group_student (group_id, user_id) VALUES (33, 50);
INSERT INTO group_student (group_id, user_id) VALUES (40, 50);
INSERT INTO group_student (group_id, user_id) VALUES (47, 50);
INSERT INTO group_student (group_id, user_id) VALUES (5, 33);
INSERT INTO group_student (group_id, user_id) VALUES (8, 33);
INSERT INTO group_student (group_id, user_id) VALUES (12, 33);
INSERT INTO group_student (group_id, user_id) VALUES (16, 33);
INSERT INTO group_student (group_id, user_id) VALUES (21, 33);
INSERT INTO group_student (group_id, user_id) VALUES (24, 33);
INSERT INTO group_student (group_id, user_id) VALUES (27, 33);
INSERT INTO group_student (group_id, user_id) VALUES (30, 33);
INSERT INTO group_student (group_id, user_id) VALUES (33, 33);
INSERT INTO group_student (group_id, user_id) VALUES (40, 33);
INSERT INTO group_student (group_id, user_id) VALUES (47, 33);
INSERT INTO group_student (group_id, user_id) VALUES (11, 6);
INSERT INTO group_student (group_id, user_id) VALUES (14, 6);
INSERT INTO group_student (group_id, user_id) VALUES (19, 6);
INSERT INTO group_student (group_id, user_id) VALUES (36, 6);
INSERT INTO group_student (group_id, user_id) VALUES (38, 6);
INSERT INTO group_student (group_id, user_id) VALUES (43, 6);
INSERT INTO group_student (group_id, user_id) VALUES (45, 6);
INSERT INTO group_student (group_id, user_id) VALUES (50, 6);
INSERT INTO group_student (group_id, user_id) VALUES (52, 6);
INSERT INTO group_student (group_id, user_id) VALUES (4, 40);
INSERT INTO group_student (group_id, user_id) VALUES (7, 40);
INSERT INTO group_student (group_id, user_id) VALUES (15, 40);
INSERT INTO group_student (group_id, user_id) VALUES (20, 40);
INSERT INTO group_student (group_id, user_id) VALUES (23, 40);
INSERT INTO group_student (group_id, user_id) VALUES (26, 40);
INSERT INTO group_student (group_id, user_id) VALUES (29, 40);
INSERT INTO group_student (group_id, user_id) VALUES (32, 40);
INSERT INTO group_student (group_id, user_id) VALUES (39, 40);
INSERT INTO group_student (group_id, user_id) VALUES (46, 40);
INSERT INTO group_student (group_id, user_id) VALUES (6, 56);
INSERT INTO group_student (group_id, user_id) VALUES (9, 56);
INSERT INTO group_student (group_id, user_id) VALUES (13, 56);
INSERT INTO group_student (group_id, user_id) VALUES (17, 56);
INSERT INTO group_student (group_id, user_id) VALUES (22, 56);
INSERT INTO group_student (group_id, user_id) VALUES (28, 56);
INSERT INTO group_student (group_id, user_id) VALUES (31, 56);
INSERT INTO group_student (group_id, user_id) VALUES (34, 56);
INSERT INTO group_student (group_id, user_id) VALUES (41, 56);
INSERT INTO group_student (group_id, user_id) VALUES (48, 56);
INSERT INTO group_student (group_id, user_id) VALUES (4, 53);
INSERT INTO group_student (group_id, user_id) VALUES (7, 53);
INSERT INTO group_student (group_id, user_id) VALUES (15, 53);
INSERT INTO group_student (group_id, user_id) VALUES (20, 53);
INSERT INTO group_student (group_id, user_id) VALUES (23, 53);
INSERT INTO group_student (group_id, user_id) VALUES (26, 53);
INSERT INTO group_student (group_id, user_id) VALUES (29, 53);
INSERT INTO group_student (group_id, user_id) VALUES (32, 53);
INSERT INTO group_student (group_id, user_id) VALUES (39, 53);
INSERT INTO group_student (group_id, user_id) VALUES (46, 53);
INSERT INTO group_student (group_id, user_id) VALUES (6, 62);
INSERT INTO group_student (group_id, user_id) VALUES (9, 62);
INSERT INTO group_student (group_id, user_id) VALUES (13, 62);
INSERT INTO group_student (group_id, user_id) VALUES (17, 62);
INSERT INTO group_student (group_id, user_id) VALUES (22, 62);
INSERT INTO group_student (group_id, user_id) VALUES (28, 62);
INSERT INTO group_student (group_id, user_id) VALUES (31, 62);
INSERT INTO group_student (group_id, user_id) VALUES (34, 62);
INSERT INTO group_student (group_id, user_id) VALUES (41, 62);
INSERT INTO group_student (group_id, user_id) VALUES (48, 62);
INSERT INTO group_student (group_id, user_id) VALUES (11, 19);
INSERT INTO group_student (group_id, user_id) VALUES (14, 19);
INSERT INTO group_student (group_id, user_id) VALUES (19, 19);
INSERT INTO group_student (group_id, user_id) VALUES (36, 19);
INSERT INTO group_student (group_id, user_id) VALUES (38, 19);
INSERT INTO group_student (group_id, user_id) VALUES (43, 19);
INSERT INTO group_student (group_id, user_id) VALUES (45, 19);
INSERT INTO group_student (group_id, user_id) VALUES (50, 19);
INSERT INTO group_student (group_id, user_id) VALUES (52, 19);
INSERT INTO group_student (group_id, user_id) VALUES (4, 29);
INSERT INTO group_student (group_id, user_id) VALUES (7, 29);
INSERT INTO group_student (group_id, user_id) VALUES (15, 29);
INSERT INTO group_student (group_id, user_id) VALUES (20, 29);
INSERT INTO group_student (group_id, user_id) VALUES (23, 29);
INSERT INTO group_student (group_id, user_id) VALUES (26, 29);
INSERT INTO group_student (group_id, user_id) VALUES (29, 29);
INSERT INTO group_student (group_id, user_id) VALUES (32, 29);
INSERT INTO group_student (group_id, user_id) VALUES (39, 29);
INSERT INTO group_student (group_id, user_id) VALUES (46, 29);
INSERT INTO group_student (group_id, user_id) VALUES (11, 21);
INSERT INTO group_student (group_id, user_id) VALUES (14, 21);
INSERT INTO group_student (group_id, user_id) VALUES (19, 21);
INSERT INTO group_student (group_id, user_id) VALUES (36, 21);
INSERT INTO group_student (group_id, user_id) VALUES (38, 21);
INSERT INTO group_student (group_id, user_id) VALUES (43, 21);
INSERT INTO group_student (group_id, user_id) VALUES (45, 21);
INSERT INTO group_student (group_id, user_id) VALUES (50, 21);
INSERT INTO group_student (group_id, user_id) VALUES (52, 21);
INSERT INTO group_student (group_id, user_id) VALUES (4, 57);
INSERT INTO group_student (group_id, user_id) VALUES (7, 57);
INSERT INTO group_student (group_id, user_id) VALUES (15, 57);
INSERT INTO group_student (group_id, user_id) VALUES (20, 57);
INSERT INTO group_student (group_id, user_id) VALUES (23, 57);
INSERT INTO group_student (group_id, user_id) VALUES (26, 57);
INSERT INTO group_student (group_id, user_id) VALUES (29, 57);
INSERT INTO group_student (group_id, user_id) VALUES (32, 57);
INSERT INTO group_student (group_id, user_id) VALUES (39, 57);
INSERT INTO group_student (group_id, user_id) VALUES (46, 57);
INSERT INTO group_student (group_id, user_id) VALUES (5, 51);
INSERT INTO group_student (group_id, user_id) VALUES (8, 51);
INSERT INTO group_student (group_id, user_id) VALUES (12, 51);
INSERT INTO group_student (group_id, user_id) VALUES (16, 51);
INSERT INTO group_student (group_id, user_id) VALUES (21, 51);
INSERT INTO group_student (group_id, user_id) VALUES (24, 51);
INSERT INTO group_student (group_id, user_id) VALUES (27, 51);
INSERT INTO group_student (group_id, user_id) VALUES (30, 51);
INSERT INTO group_student (group_id, user_id) VALUES (33, 51);
INSERT INTO group_student (group_id, user_id) VALUES (40, 51);
INSERT INTO group_student (group_id, user_id) VALUES (47, 51);
INSERT INTO group_student (group_id, user_id) VALUES (11, 23);
INSERT INTO group_student (group_id, user_id) VALUES (14, 23);
INSERT INTO group_student (group_id, user_id) VALUES (19, 23);
INSERT INTO group_student (group_id, user_id) VALUES (36, 23);
INSERT INTO group_student (group_id, user_id) VALUES (38, 23);
INSERT INTO group_student (group_id, user_id) VALUES (43, 23);
INSERT INTO group_student (group_id, user_id) VALUES (45, 23);
INSERT INTO group_student (group_id, user_id) VALUES (50, 23);
INSERT INTO group_student (group_id, user_id) VALUES (52, 23);
INSERT INTO group_student (group_id, user_id) VALUES (4, 41);
INSERT INTO group_student (group_id, user_id) VALUES (7, 41);
INSERT INTO group_student (group_id, user_id) VALUES (15, 41);
INSERT INTO group_student (group_id, user_id) VALUES (20, 41);
INSERT INTO group_student (group_id, user_id) VALUES (23, 41);
INSERT INTO group_student (group_id, user_id) VALUES (26, 41);
INSERT INTO group_student (group_id, user_id) VALUES (29, 41);
INSERT INTO group_student (group_id, user_id) VALUES (32, 41);
INSERT INTO group_student (group_id, user_id) VALUES (39, 41);
INSERT INTO group_student (group_id, user_id) VALUES (46, 41);
INSERT INTO group_student (group_id, user_id) VALUES (4, 31);
INSERT INTO group_student (group_id, user_id) VALUES (7, 31);
INSERT INTO group_student (group_id, user_id) VALUES (15, 31);
INSERT INTO group_student (group_id, user_id) VALUES (20, 31);
INSERT INTO group_student (group_id, user_id) VALUES (23, 31);
INSERT INTO group_student (group_id, user_id) VALUES (26, 31);
INSERT INTO group_student (group_id, user_id) VALUES (29, 31);
INSERT INTO group_student (group_id, user_id) VALUES (32, 31);
INSERT INTO group_student (group_id, user_id) VALUES (39, 31);
INSERT INTO group_student (group_id, user_id) VALUES (46, 31);
INSERT INTO group_student (group_id, user_id) VALUES (6, 35);
INSERT INTO group_student (group_id, user_id) VALUES (9, 35);
INSERT INTO group_student (group_id, user_id) VALUES (13, 35);
INSERT INTO group_student (group_id, user_id) VALUES (17, 35);
INSERT INTO group_student (group_id, user_id) VALUES (22, 35);
INSERT INTO group_student (group_id, user_id) VALUES (28, 35);
INSERT INTO group_student (group_id, user_id) VALUES (31, 35);
INSERT INTO group_student (group_id, user_id) VALUES (34, 35);
INSERT INTO group_student (group_id, user_id) VALUES (41, 35);
INSERT INTO group_student (group_id, user_id) VALUES (48, 35);
INSERT INTO group_student (group_id, user_id) VALUES (6, 65);
INSERT INTO group_student (group_id, user_id) VALUES (9, 65);
INSERT INTO group_student (group_id, user_id) VALUES (13, 65);
INSERT INTO group_student (group_id, user_id) VALUES (17, 65);
INSERT INTO group_student (group_id, user_id) VALUES (22, 65);
INSERT INTO group_student (group_id, user_id) VALUES (28, 65);
INSERT INTO group_student (group_id, user_id) VALUES (31, 65);
INSERT INTO group_student (group_id, user_id) VALUES (34, 65);
INSERT INTO group_student (group_id, user_id) VALUES (41, 65);
INSERT INTO group_student (group_id, user_id) VALUES (48, 65);
INSERT INTO group_student (group_id, user_id) VALUES (5, 52);
INSERT INTO group_student (group_id, user_id) VALUES (8, 52);
INSERT INTO group_student (group_id, user_id) VALUES (12, 52);
INSERT INTO group_student (group_id, user_id) VALUES (16, 52);
INSERT INTO group_student (group_id, user_id) VALUES (21, 52);
INSERT INTO group_student (group_id, user_id) VALUES (24, 52);
INSERT INTO group_student (group_id, user_id) VALUES (27, 52);
INSERT INTO group_student (group_id, user_id) VALUES (30, 52);
INSERT INTO group_student (group_id, user_id) VALUES (33, 52);
INSERT INTO group_student (group_id, user_id) VALUES (40, 52);
INSERT INTO group_student (group_id, user_id) VALUES (47, 52);
INSERT INTO group_student (group_id, user_id) VALUES (10, 20);
INSERT INTO group_student (group_id, user_id) VALUES (18, 20);
INSERT INTO group_student (group_id, user_id) VALUES (25, 20);
INSERT INTO group_student (group_id, user_id) VALUES (35, 20);
INSERT INTO group_student (group_id, user_id) VALUES (37, 20);
INSERT INTO group_student (group_id, user_id) VALUES (42, 20);
INSERT INTO group_student (group_id, user_id) VALUES (44, 20);
INSERT INTO group_student (group_id, user_id) VALUES (49, 20);
INSERT INTO group_student (group_id, user_id) VALUES (51, 20);
INSERT INTO group_student (group_id, user_id) VALUES (4, 69);
INSERT INTO group_student (group_id, user_id) VALUES (7, 69);
INSERT INTO group_student (group_id, user_id) VALUES (15, 69);
INSERT INTO group_student (group_id, user_id) VALUES (20, 69);
INSERT INTO group_student (group_id, user_id) VALUES (23, 69);
INSERT INTO group_student (group_id, user_id) VALUES (26, 69);
INSERT INTO group_student (group_id, user_id) VALUES (29, 69);
INSERT INTO group_student (group_id, user_id) VALUES (32, 69);
INSERT INTO group_student (group_id, user_id) VALUES (39, 69);
INSERT INTO group_student (group_id, user_id) VALUES (46, 69);
INSERT INTO group_student (group_id, user_id) VALUES (11, 5);
INSERT INTO group_student (group_id, user_id) VALUES (14, 5);
INSERT INTO group_student (group_id, user_id) VALUES (19, 5);
INSERT INTO group_student (group_id, user_id) VALUES (36, 5);
INSERT INTO group_student (group_id, user_id) VALUES (38, 5);
INSERT INTO group_student (group_id, user_id) VALUES (43, 5);
INSERT INTO group_student (group_id, user_id) VALUES (45, 5);
INSERT INTO group_student (group_id, user_id) VALUES (50, 5);
INSERT INTO group_student (group_id, user_id) VALUES (52, 5);
INSERT INTO group_student (group_id, user_id) VALUES (4, 44);
INSERT INTO group_student (group_id, user_id) VALUES (7, 44);
INSERT INTO group_student (group_id, user_id) VALUES (15, 44);
INSERT INTO group_student (group_id, user_id) VALUES (20, 44);
INSERT INTO group_student (group_id, user_id) VALUES (23, 44);
INSERT INTO group_student (group_id, user_id) VALUES (26, 44);
INSERT INTO group_student (group_id, user_id) VALUES (29, 44);
INSERT INTO group_student (group_id, user_id) VALUES (32, 44);
INSERT INTO group_student (group_id, user_id) VALUES (39, 44);
INSERT INTO group_student (group_id, user_id) VALUES (46, 44);
INSERT INTO group_student (group_id, user_id) VALUES (10, 7);
INSERT INTO group_student (group_id, user_id) VALUES (18, 7);
INSERT INTO group_student (group_id, user_id) VALUES (25, 7);
INSERT INTO group_student (group_id, user_id) VALUES (35, 7);
INSERT INTO group_student (group_id, user_id) VALUES (37, 7);
INSERT INTO group_student (group_id, user_id) VALUES (42, 7);
INSERT INTO group_student (group_id, user_id) VALUES (44, 7);
INSERT INTO group_student (group_id, user_id) VALUES (49, 7);
INSERT INTO group_student (group_id, user_id) VALUES (51, 7);
INSERT INTO group_student (group_id, user_id) VALUES (6, 37);
INSERT INTO group_student (group_id, user_id) VALUES (9, 37);
INSERT INTO group_student (group_id, user_id) VALUES (13, 37);
INSERT INTO group_student (group_id, user_id) VALUES (17, 37);
INSERT INTO group_student (group_id, user_id) VALUES (22, 37);
INSERT INTO group_student (group_id, user_id) VALUES (28, 37);
INSERT INTO group_student (group_id, user_id) VALUES (31, 37);
INSERT INTO group_student (group_id, user_id) VALUES (34, 37);
INSERT INTO group_student (group_id, user_id) VALUES (41, 37);
INSERT INTO group_student (group_id, user_id) VALUES (48, 37);
INSERT INTO group_student (group_id, user_id) VALUES (5, 34);
INSERT INTO group_student (group_id, user_id) VALUES (8, 34);
INSERT INTO group_student (group_id, user_id) VALUES (12, 34);
INSERT INTO group_student (group_id, user_id) VALUES (16, 34);
INSERT INTO group_student (group_id, user_id) VALUES (21, 34);
INSERT INTO group_student (group_id, user_id) VALUES (24, 34);
INSERT INTO group_student (group_id, user_id) VALUES (27, 34);
INSERT INTO group_student (group_id, user_id) VALUES (30, 34);
INSERT INTO group_student (group_id, user_id) VALUES (33, 34);
INSERT INTO group_student (group_id, user_id) VALUES (40, 34);
INSERT INTO group_student (group_id, user_id) VALUES (47, 34);


--
-- Data for Name: group_teacher; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO group_teacher (group_id, user_id) VALUES (4, 79);
INSERT INTO group_teacher (group_id, user_id) VALUES (5, 79);
INSERT INTO group_teacher (group_id, user_id) VALUES (6, 79);
INSERT INTO group_teacher (group_id, user_id) VALUES (7, 86);
INSERT INTO group_teacher (group_id, user_id) VALUES (8, 86);
INSERT INTO group_teacher (group_id, user_id) VALUES (9, 86);
INSERT INTO group_teacher (group_id, user_id) VALUES (10, 86);
INSERT INTO group_teacher (group_id, user_id) VALUES (11, 86);
INSERT INTO group_teacher (group_id, user_id) VALUES (12, 78);
INSERT INTO group_teacher (group_id, user_id) VALUES (13, 78);
INSERT INTO group_teacher (group_id, user_id) VALUES (14, 78);
INSERT INTO group_teacher (group_id, user_id) VALUES (15, 85);
INSERT INTO group_teacher (group_id, user_id) VALUES (16, 85);
INSERT INTO group_teacher (group_id, user_id) VALUES (17, 85);
INSERT INTO group_teacher (group_id, user_id) VALUES (18, 76);
INSERT INTO group_teacher (group_id, user_id) VALUES (19, 76);
INSERT INTO group_teacher (group_id, user_id) VALUES (20, 72);
INSERT INTO group_teacher (group_id, user_id) VALUES (21, 72);
INSERT INTO group_teacher (group_id, user_id) VALUES (22, 72);
INSERT INTO group_teacher (group_id, user_id) VALUES (23, 77);
INSERT INTO group_teacher (group_id, user_id) VALUES (24, 77);
INSERT INTO group_teacher (group_id, user_id) VALUES (25, 77);
INSERT INTO group_teacher (group_id, user_id) VALUES (26, 81);
INSERT INTO group_teacher (group_id, user_id) VALUES (27, 81);
INSERT INTO group_teacher (group_id, user_id) VALUES (28, 81);
INSERT INTO group_teacher (group_id, user_id) VALUES (29, 83);
INSERT INTO group_teacher (group_id, user_id) VALUES (30, 83);
INSERT INTO group_teacher (group_id, user_id) VALUES (31, 83);
INSERT INTO group_teacher (group_id, user_id) VALUES (32, 70);
INSERT INTO group_teacher (group_id, user_id) VALUES (33, 70);
INSERT INTO group_teacher (group_id, user_id) VALUES (34, 70);
INSERT INTO group_teacher (group_id, user_id) VALUES (35, 70);
INSERT INTO group_teacher (group_id, user_id) VALUES (36, 70);
INSERT INTO group_teacher (group_id, user_id) VALUES (37, 80);
INSERT INTO group_teacher (group_id, user_id) VALUES (38, 80);
INSERT INTO group_teacher (group_id, user_id) VALUES (39, 80);
INSERT INTO group_teacher (group_id, user_id) VALUES (40, 80);
INSERT INTO group_teacher (group_id, user_id) VALUES (41, 80);
INSERT INTO group_teacher (group_id, user_id) VALUES (42, 75);
INSERT INTO group_teacher (group_id, user_id) VALUES (43, 75);
INSERT INTO group_teacher (group_id, user_id) VALUES (44, 75);
INSERT INTO group_teacher (group_id, user_id) VALUES (45, 75);
INSERT INTO group_teacher (group_id, user_id) VALUES (46, 70);
INSERT INTO group_teacher (group_id, user_id) VALUES (47, 70);
INSERT INTO group_teacher (group_id, user_id) VALUES (48, 70);
INSERT INTO group_teacher (group_id, user_id) VALUES (49, 75);
INSERT INTO group_teacher (group_id, user_id) VALUES (50, 75);
INSERT INTO group_teacher (group_id, user_id) VALUES (51, 75);
INSERT INTO group_teacher (group_id, user_id) VALUES (52, 75);


--
-- Data for Name: groups; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO groups (id, semester_id, subject_id, level_id, deleted_at, created_at, updated_at) VALUES (4, 1, 1, 4, NULL, '2018-02-19 18:14:24', '2018-02-19 18:14:24');
INSERT INTO groups (id, semester_id, subject_id, level_id, deleted_at, created_at, updated_at) VALUES (5, 1, 1, 5, NULL, '2018-02-19 18:14:38', '2018-02-19 18:14:38');
INSERT INTO groups (id, semester_id, subject_id, level_id, deleted_at, created_at, updated_at) VALUES (6, 1, 1, 6, NULL, '2018-02-19 18:14:51', '2018-02-19 18:14:51');
INSERT INTO groups (id, semester_id, subject_id, level_id, deleted_at, created_at, updated_at) VALUES (7, 1, 2, 4, NULL, '2018-02-19 18:16:24', '2018-02-19 18:16:24');
INSERT INTO groups (id, semester_id, subject_id, level_id, deleted_at, created_at, updated_at) VALUES (8, 1, 2, 5, NULL, '2018-02-19 18:16:34', '2018-02-19 18:16:34');
INSERT INTO groups (id, semester_id, subject_id, level_id, deleted_at, created_at, updated_at) VALUES (9, 1, 2, 6, NULL, '2018-02-19 18:16:42', '2018-02-19 18:16:42');
INSERT INTO groups (id, semester_id, subject_id, level_id, deleted_at, created_at, updated_at) VALUES (10, 1, 2, 2, NULL, '2018-02-19 18:16:50', '2018-02-19 18:16:50');
INSERT INTO groups (id, semester_id, subject_id, level_id, deleted_at, created_at, updated_at) VALUES (11, 1, 2, 3, NULL, '2018-02-19 18:16:56', '2018-02-19 18:16:56');
INSERT INTO groups (id, semester_id, subject_id, level_id, deleted_at, created_at, updated_at) VALUES (12, 1, 3, 5, NULL, '2018-02-19 18:17:07', '2018-02-19 18:17:07');
INSERT INTO groups (id, semester_id, subject_id, level_id, deleted_at, created_at, updated_at) VALUES (13, 1, 3, 6, NULL, '2018-02-19 18:17:14', '2018-02-19 18:17:14');
INSERT INTO groups (id, semester_id, subject_id, level_id, deleted_at, created_at, updated_at) VALUES (14, 1, 3, 3, NULL, '2018-02-19 18:17:23', '2018-02-19 18:17:23');
INSERT INTO groups (id, semester_id, subject_id, level_id, deleted_at, created_at, updated_at) VALUES (15, 1, 4, 4, NULL, '2018-02-19 18:17:35', '2018-02-19 18:17:35');
INSERT INTO groups (id, semester_id, subject_id, level_id, deleted_at, created_at, updated_at) VALUES (16, 1, 4, 5, NULL, '2018-02-19 18:17:42', '2018-02-19 18:17:42');
INSERT INTO groups (id, semester_id, subject_id, level_id, deleted_at, created_at, updated_at) VALUES (17, 1, 4, 6, NULL, '2018-02-19 18:17:48', '2018-02-19 18:17:48');
INSERT INTO groups (id, semester_id, subject_id, level_id, deleted_at, created_at, updated_at) VALUES (18, 1, 4, 2, NULL, '2018-02-19 18:18:04', '2018-02-19 18:18:04');
INSERT INTO groups (id, semester_id, subject_id, level_id, deleted_at, created_at, updated_at) VALUES (19, 1, 4, 3, NULL, '2018-02-19 18:18:18', '2018-02-19 18:18:18');
INSERT INTO groups (id, semester_id, subject_id, level_id, deleted_at, created_at, updated_at) VALUES (20, 1, 5, 4, NULL, '2018-02-19 18:18:34', '2018-02-19 18:18:34');
INSERT INTO groups (id, semester_id, subject_id, level_id, deleted_at, created_at, updated_at) VALUES (21, 1, 5, 5, NULL, '2018-02-19 18:19:05', '2018-02-19 18:19:05');
INSERT INTO groups (id, semester_id, subject_id, level_id, deleted_at, created_at, updated_at) VALUES (22, 1, 5, 6, NULL, '2018-02-19 18:19:15', '2018-02-19 18:19:15');
INSERT INTO groups (id, semester_id, subject_id, level_id, deleted_at, created_at, updated_at) VALUES (23, 1, 6, 4, NULL, '2018-02-19 18:19:32', '2018-02-19 18:19:32');
INSERT INTO groups (id, semester_id, subject_id, level_id, deleted_at, created_at, updated_at) VALUES (24, 1, 6, 5, NULL, '2018-02-19 18:19:39', '2018-02-19 18:19:39');
INSERT INTO groups (id, semester_id, subject_id, level_id, deleted_at, created_at, updated_at) VALUES (25, 1, 6, 2, NULL, '2018-02-19 18:20:24', '2018-02-19 18:20:24');
INSERT INTO groups (id, semester_id, subject_id, level_id, deleted_at, created_at, updated_at) VALUES (26, 1, 7, 4, NULL, '2018-02-19 18:21:02', '2018-02-19 18:21:02');
INSERT INTO groups (id, semester_id, subject_id, level_id, deleted_at, created_at, updated_at) VALUES (27, 1, 7, 5, NULL, '2018-02-19 18:21:09', '2018-02-19 18:21:09');
INSERT INTO groups (id, semester_id, subject_id, level_id, deleted_at, created_at, updated_at) VALUES (28, 1, 7, 6, NULL, '2018-02-19 18:21:15', '2018-02-19 18:21:15');
INSERT INTO groups (id, semester_id, subject_id, level_id, deleted_at, created_at, updated_at) VALUES (29, 1, 8, 4, NULL, '2018-02-19 18:21:25', '2018-02-19 18:21:25');
INSERT INTO groups (id, semester_id, subject_id, level_id, deleted_at, created_at, updated_at) VALUES (30, 1, 8, 5, NULL, '2018-02-19 18:21:33', '2018-02-19 18:21:33');
INSERT INTO groups (id, semester_id, subject_id, level_id, deleted_at, created_at, updated_at) VALUES (31, 1, 8, 6, NULL, '2018-02-19 18:21:41', '2018-02-19 18:21:41');
INSERT INTO groups (id, semester_id, subject_id, level_id, deleted_at, created_at, updated_at) VALUES (32, 1, 9, 4, NULL, '2018-02-19 18:21:54', '2018-02-19 18:21:54');
INSERT INTO groups (id, semester_id, subject_id, level_id, deleted_at, created_at, updated_at) VALUES (33, 1, 9, 5, NULL, '2018-02-19 18:22:01', '2018-02-19 18:22:01');
INSERT INTO groups (id, semester_id, subject_id, level_id, deleted_at, created_at, updated_at) VALUES (34, 1, 9, 6, NULL, '2018-02-19 18:22:08', '2018-02-19 18:22:08');
INSERT INTO groups (id, semester_id, subject_id, level_id, deleted_at, created_at, updated_at) VALUES (35, 1, 9, 2, NULL, '2018-02-19 18:22:14', '2018-02-19 18:22:14');
INSERT INTO groups (id, semester_id, subject_id, level_id, deleted_at, created_at, updated_at) VALUES (36, 1, 9, 3, NULL, '2018-02-19 18:22:20', '2018-02-19 18:22:20');
INSERT INTO groups (id, semester_id, subject_id, level_id, deleted_at, created_at, updated_at) VALUES (37, 1, 10, 2, NULL, '2018-02-19 18:22:33', '2018-02-19 18:22:33');
INSERT INTO groups (id, semester_id, subject_id, level_id, deleted_at, created_at, updated_at) VALUES (38, 1, 10, 3, NULL, '2018-02-19 18:22:42', '2018-02-19 18:22:42');
INSERT INTO groups (id, semester_id, subject_id, level_id, deleted_at, created_at, updated_at) VALUES (39, 1, 10, 4, NULL, '2018-02-19 18:22:49', '2018-02-19 18:22:49');
INSERT INTO groups (id, semester_id, subject_id, level_id, deleted_at, created_at, updated_at) VALUES (40, 1, 10, 5, NULL, '2018-02-19 18:22:57', '2018-02-19 18:22:57');
INSERT INTO groups (id, semester_id, subject_id, level_id, deleted_at, created_at, updated_at) VALUES (41, 1, 10, 6, NULL, '2018-02-19 18:23:07', '2018-02-19 18:23:07');
INSERT INTO groups (id, semester_id, subject_id, level_id, deleted_at, created_at, updated_at) VALUES (42, 1, 11, 2, NULL, '2018-02-19 18:23:21', '2018-02-19 18:23:21');
INSERT INTO groups (id, semester_id, subject_id, level_id, deleted_at, created_at, updated_at) VALUES (43, 1, 11, 3, NULL, '2018-02-19 18:23:29', '2018-02-19 18:23:29');
INSERT INTO groups (id, semester_id, subject_id, level_id, deleted_at, created_at, updated_at) VALUES (44, 1, 12, 2, NULL, '2018-02-19 18:23:40', '2018-02-19 18:23:40');
INSERT INTO groups (id, semester_id, subject_id, level_id, deleted_at, created_at, updated_at) VALUES (45, 1, 12, 3, NULL, '2018-02-19 18:23:47', '2018-02-19 18:23:47');
INSERT INTO groups (id, semester_id, subject_id, level_id, deleted_at, created_at, updated_at) VALUES (46, 1, 14, 4, NULL, '2018-02-19 18:25:45', '2018-02-19 18:25:45');
INSERT INTO groups (id, semester_id, subject_id, level_id, deleted_at, created_at, updated_at) VALUES (47, 1, 14, 5, NULL, '2018-02-19 18:25:51', '2018-02-19 18:25:51');
INSERT INTO groups (id, semester_id, subject_id, level_id, deleted_at, created_at, updated_at) VALUES (48, 1, 14, 6, NULL, '2018-02-19 18:25:57', '2018-02-19 18:25:57');
INSERT INTO groups (id, semester_id, subject_id, level_id, deleted_at, created_at, updated_at) VALUES (49, 1, 13, 2, NULL, '2018-02-19 18:26:15', '2018-02-19 18:26:15');
INSERT INTO groups (id, semester_id, subject_id, level_id, deleted_at, created_at, updated_at) VALUES (50, 1, 13, 3, NULL, '2018-02-19 18:26:23', '2018-02-19 18:26:23');
INSERT INTO groups (id, semester_id, subject_id, level_id, deleted_at, created_at, updated_at) VALUES (51, 1, 5, 2, NULL, '2018-02-19 18:26:33', '2018-02-19 18:26:33');
INSERT INTO groups (id, semester_id, subject_id, level_id, deleted_at, created_at, updated_at) VALUES (52, 1, 5, 3, NULL, '2018-02-19 18:26:43', '2018-02-19 18:26:43');


--
-- Name: groups_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('groups_id_seq', 52, true);


--
-- Data for Name: levels; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO levels (id, name, deleted_at, created_at, updated_at) VALUES (1, 'A', NULL, '2018-02-19 15:34:16', '2018-02-19 15:34:16');
INSERT INTO levels (id, name, deleted_at, created_at, updated_at) VALUES (2, 'TE A', NULL, '2018-02-19 16:17:44', '2018-02-19 16:29:36');
INSERT INTO levels (id, name, deleted_at, created_at, updated_at) VALUES (3, 'TE B', NULL, '2018-02-19 16:29:43', '2018-02-19 16:29:43');
INSERT INTO levels (id, name, deleted_at, created_at, updated_at) VALUES (4, 'B', NULL, '2018-02-19 16:29:48', '2018-02-19 16:29:48');
INSERT INTO levels (id, name, deleted_at, created_at, updated_at) VALUES (5, 'C', NULL, '2018-02-19 16:49:39', '2018-02-19 16:49:39');
INSERT INTO levels (id, name, deleted_at, created_at, updated_at) VALUES (6, 'D', NULL, '2018-02-19 16:49:43', '2018-02-19 16:49:43');


--
-- Name: levels_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('levels_id_seq', 6, true);


--
-- Data for Name: migrations; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO migrations (id, migration, batch) VALUES (1, '2014_10_12_000000_create_users_table', 1);
INSERT INTO migrations (id, migration, batch) VALUES (2, '2014_10_12_100000_create_password_resets_table', 1);
INSERT INTO migrations (id, migration, batch) VALUES (3, '2018_01_08_015226_create_initial_schema', 1);
INSERT INTO migrations (id, migration, batch) VALUES (4, '2018_01_16_013124_entrust_setup_tables', 1);


--
-- Name: migrations_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('migrations_id_seq', 4, true);


--
-- Data for Name: partials; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO partials (id, name, "order", is_final, semester_id, deleted_at, created_at, updated_at) VALUES (1, 'Parcial 1', 1, 0, 1, NULL, '2018-02-19 15:34:16', '2018-02-19 15:34:16');
INSERT INTO partials (id, name, "order", is_final, semester_id, deleted_at, created_at, updated_at) VALUES (2, 'Parcial 2', 2, 0, 1, NULL, '2018-02-19 15:34:16', '2018-02-19 15:34:16');
INSERT INTO partials (id, name, "order", is_final, semester_id, deleted_at, created_at, updated_at) VALUES (3, 'Final', 3, 1, 1, NULL, '2018-02-19 15:34:16', '2018-02-19 15:34:16');


--
-- Name: partials_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('partials_id_seq', 3, true);


--
-- Data for Name: password_resets; Type: TABLE DATA; Schema: public; Owner: -
--



--
-- Data for Name: permission_role; Type: TABLE DATA; Schema: public; Owner: -
--



--
-- Data for Name: permissions; Type: TABLE DATA; Schema: public; Owner: -
--



--
-- Name: permissions_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('permissions_id_seq', 1, false);


--
-- Data for Name: role_user; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO role_user (user_id, role_id) VALUES (1, 1);
INSERT INTO role_user (user_id, role_id) VALUES (4, 3);
INSERT INTO role_user (user_id, role_id) VALUES (5, 3);
INSERT INTO role_user (user_id, role_id) VALUES (6, 3);
INSERT INTO role_user (user_id, role_id) VALUES (7, 3);
INSERT INTO role_user (user_id, role_id) VALUES (8, 3);
INSERT INTO role_user (user_id, role_id) VALUES (9, 3);
INSERT INTO role_user (user_id, role_id) VALUES (10, 3);
INSERT INTO role_user (user_id, role_id) VALUES (11, 3);
INSERT INTO role_user (user_id, role_id) VALUES (12, 3);
INSERT INTO role_user (user_id, role_id) VALUES (13, 3);
INSERT INTO role_user (user_id, role_id) VALUES (14, 3);
INSERT INTO role_user (user_id, role_id) VALUES (15, 3);
INSERT INTO role_user (user_id, role_id) VALUES (16, 3);
INSERT INTO role_user (user_id, role_id) VALUES (17, 3);
INSERT INTO role_user (user_id, role_id) VALUES (18, 3);
INSERT INTO role_user (user_id, role_id) VALUES (19, 3);
INSERT INTO role_user (user_id, role_id) VALUES (20, 3);
INSERT INTO role_user (user_id, role_id) VALUES (21, 3);
INSERT INTO role_user (user_id, role_id) VALUES (22, 3);
INSERT INTO role_user (user_id, role_id) VALUES (23, 3);
INSERT INTO role_user (user_id, role_id) VALUES (24, 3);
INSERT INTO role_user (user_id, role_id) VALUES (25, 3);
INSERT INTO role_user (user_id, role_id) VALUES (26, 3);
INSERT INTO role_user (user_id, role_id) VALUES (27, 3);
INSERT INTO role_user (user_id, role_id) VALUES (28, 3);
INSERT INTO role_user (user_id, role_id) VALUES (29, 3);
INSERT INTO role_user (user_id, role_id) VALUES (30, 3);
INSERT INTO role_user (user_id, role_id) VALUES (31, 3);
INSERT INTO role_user (user_id, role_id) VALUES (32, 3);
INSERT INTO role_user (user_id, role_id) VALUES (33, 3);
INSERT INTO role_user (user_id, role_id) VALUES (34, 3);
INSERT INTO role_user (user_id, role_id) VALUES (35, 3);
INSERT INTO role_user (user_id, role_id) VALUES (36, 3);
INSERT INTO role_user (user_id, role_id) VALUES (37, 3);
INSERT INTO role_user (user_id, role_id) VALUES (38, 3);
INSERT INTO role_user (user_id, role_id) VALUES (39, 3);
INSERT INTO role_user (user_id, role_id) VALUES (40, 3);
INSERT INTO role_user (user_id, role_id) VALUES (41, 3);
INSERT INTO role_user (user_id, role_id) VALUES (42, 3);
INSERT INTO role_user (user_id, role_id) VALUES (43, 3);
INSERT INTO role_user (user_id, role_id) VALUES (44, 3);
INSERT INTO role_user (user_id, role_id) VALUES (45, 3);
INSERT INTO role_user (user_id, role_id) VALUES (46, 3);
INSERT INTO role_user (user_id, role_id) VALUES (47, 3);
INSERT INTO role_user (user_id, role_id) VALUES (48, 3);
INSERT INTO role_user (user_id, role_id) VALUES (49, 3);
INSERT INTO role_user (user_id, role_id) VALUES (50, 3);
INSERT INTO role_user (user_id, role_id) VALUES (51, 3);
INSERT INTO role_user (user_id, role_id) VALUES (52, 3);
INSERT INTO role_user (user_id, role_id) VALUES (53, 3);
INSERT INTO role_user (user_id, role_id) VALUES (54, 3);
INSERT INTO role_user (user_id, role_id) VALUES (55, 3);
INSERT INTO role_user (user_id, role_id) VALUES (56, 3);
INSERT INTO role_user (user_id, role_id) VALUES (57, 3);
INSERT INTO role_user (user_id, role_id) VALUES (58, 3);
INSERT INTO role_user (user_id, role_id) VALUES (59, 3);
INSERT INTO role_user (user_id, role_id) VALUES (60, 3);
INSERT INTO role_user (user_id, role_id) VALUES (61, 3);
INSERT INTO role_user (user_id, role_id) VALUES (62, 3);
INSERT INTO role_user (user_id, role_id) VALUES (63, 3);
INSERT INTO role_user (user_id, role_id) VALUES (64, 3);
INSERT INTO role_user (user_id, role_id) VALUES (65, 3);
INSERT INTO role_user (user_id, role_id) VALUES (66, 3);
INSERT INTO role_user (user_id, role_id) VALUES (67, 3);
INSERT INTO role_user (user_id, role_id) VALUES (68, 3);
INSERT INTO role_user (user_id, role_id) VALUES (69, 3);
INSERT INTO role_user (user_id, role_id) VALUES (73, 2);
INSERT INTO role_user (user_id, role_id) VALUES (74, 2);
INSERT INTO role_user (user_id, role_id) VALUES (82, 2);
INSERT INTO role_user (user_id, role_id) VALUES (84, 2);
INSERT INTO role_user (user_id, role_id) VALUES (86, 2);
INSERT INTO role_user (user_id, role_id) VALUES (85, 2);
INSERT INTO role_user (user_id, role_id) VALUES (81, 2);
INSERT INTO role_user (user_id, role_id) VALUES (80, 2);
INSERT INTO role_user (user_id, role_id) VALUES (79, 2);
INSERT INTO role_user (user_id, role_id) VALUES (83, 2);
INSERT INTO role_user (user_id, role_id) VALUES (78, 2);
INSERT INTO role_user (user_id, role_id) VALUES (77, 2);
INSERT INTO role_user (user_id, role_id) VALUES (76, 2);
INSERT INTO role_user (user_id, role_id) VALUES (75, 2);
INSERT INTO role_user (user_id, role_id) VALUES (72, 2);
INSERT INTO role_user (user_id, role_id) VALUES (71, 2);
INSERT INTO role_user (user_id, role_id) VALUES (70, 2);


--
-- Data for Name: roles; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO roles (id, name, display_name, description, created_at, updated_at) VALUES (1, 'admin', 'Administrador', NULL, '2018-02-19 15:34:16', '2018-02-19 15:34:16');
INSERT INTO roles (id, name, display_name, description, created_at, updated_at) VALUES (2, 'teacher', 'Maestro', NULL, '2018-02-19 15:34:16', '2018-02-19 15:34:16');
INSERT INTO roles (id, name, display_name, description, created_at, updated_at) VALUES (3, 'student', 'Estudiante', NULL, '2018-02-19 15:34:16', '2018-02-19 15:34:16');


--
-- Name: roles_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('roles_id_seq', 3, true);


--
-- Data for Name: semesters; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO semesters (id, name, deleted_at, created_at, updated_at) VALUES (1, 'PR 18', NULL, '2018-02-19 15:34:16', '2018-02-19 15:34:16');
INSERT INTO semesters (id, name, deleted_at, created_at, updated_at) VALUES (2, 'VR 18', NULL, '2018-02-19 16:18:07', '2018-02-19 16:18:07');


--
-- Name: semesters_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('semesters_id_seq', 2, true);


--
-- Data for Name: subjects; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO subjects (id, name, deleted_at, created_at, updated_at) VALUES (1, 'Computacion', NULL, '2018-02-19 15:34:16', '2018-02-19 15:34:16');
INSERT INTO subjects (id, name, deleted_at, created_at, updated_at) VALUES (2, 'Arte', NULL, '2018-02-19 16:13:24', '2018-02-19 17:09:27');
INSERT INTO subjects (id, name, deleted_at, created_at, updated_at) VALUES (3, 'Inglés', NULL, '2018-02-19 16:14:00', '2018-02-19 17:09:35');
INSERT INTO subjects (id, name, deleted_at, created_at, updated_at) VALUES (4, 'Matemáticas', NULL, '2018-02-19 17:10:30', '2018-02-19 17:10:30');
INSERT INTO subjects (id, name, deleted_at, created_at, updated_at) VALUES (6, 'Taller de comunicación', NULL, '2018-02-19 17:11:19', '2018-02-19 17:11:19');
INSERT INTO subjects (id, name, deleted_at, created_at, updated_at) VALUES (7, 'Competencias para la vida', NULL, '2018-02-19 17:11:33', '2018-02-19 17:11:33');
INSERT INTO subjects (id, name, deleted_at, created_at, updated_at) VALUES (8, 'Deportes', NULL, '2018-02-19 17:11:41', '2018-02-19 17:11:41');
INSERT INTO subjects (id, name, deleted_at, created_at, updated_at) VALUES (9, 'Taller de tutoría y autoconocimiento', NULL, '2018-02-19 17:11:56', '2018-02-19 17:11:56');
INSERT INTO subjects (id, name, deleted_at, created_at, updated_at) VALUES (10, 'Teatro musical', NULL, '2018-02-19 17:12:18', '2018-02-19 17:12:18');
INSERT INTO subjects (id, name, deleted_at, created_at, updated_at) VALUES (11, 'Aptitudes laborales', NULL, '2018-02-19 17:12:58', '2018-02-19 17:12:58');
INSERT INTO subjects (id, name, deleted_at, created_at, updated_at) VALUES (12, 'Actitudes laborales', NULL, '2018-02-19 17:13:05', '2018-02-19 17:13:05');
INSERT INTO subjects (id, name, deleted_at, created_at, updated_at) VALUES (13, 'Aspectos personales', NULL, '2018-02-19 17:13:16', '2018-02-19 17:13:16');
INSERT INTO subjects (id, name, deleted_at, created_at, updated_at) VALUES (5, 'Habilidades laborales', NULL, '2018-02-19 17:11:07', '2018-02-19 18:18:47');
INSERT INTO subjects (id, name, deleted_at, created_at, updated_at) VALUES (14, 'Extra', NULL, '2018-02-19 18:25:32', '2018-02-19 18:25:32');


--
-- Name: subjects_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('subjects_id_seq', 14, true);


--
-- Data for Name: users; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO users (id, enrollment, name, username, password, level_id, remember_token, created_at, updated_at, deleted_at) VALUES (35, '574896', 'Javier Eduardo Arias García', 'javier.eduardo', '$2y$10$plzYRMVeIkqjYEHA8fT01umRzNKgUI87gsP8th6W41PDdz6.9IpH2', 6, NULL, '2018-02-19 16:53:42', '2018-02-19 16:53:42', NULL);
INSERT INTO users (id, enrollment, name, username, password, level_id, remember_token, created_at, updated_at, deleted_at) VALUES (36, '574897', 'Rodrigo Nacif Ruiz', 'rodrigo.nacif', '$2y$10$2f3vLOiudiL4i1k1VcMaouGmYpJAy2KNDcjVSy7R8WRjDBmTrcSSa', 6, NULL, '2018-02-19 16:54:06', '2018-02-19 16:54:06', NULL);
INSERT INTO users (id, enrollment, name, username, password, level_id, remember_token, created_at, updated_at, deleted_at) VALUES (37, '574898', 'Jorge Humberto Garza Vázquez', 'jorge.humberto', '$2y$10$8uVINUEG1t0vW4bVhJ4kTu9B0UH7V/a88QZPbpAhwj.pNcsxqhIDW', 6, NULL, '2018-02-19 16:54:25', '2018-02-19 16:54:25', NULL);
INSERT INTO users (id, enrollment, name, username, password, level_id, remember_token, created_at, updated_at, deleted_at) VALUES (42, '574903', 'Alfonso Villarreal Espinoza', 'alfonso.villarreal', '$2y$10$8pQiYQmY42Sxh3Fdlq8N2.3dKuE3BA52os0vdkMexjZ45lRYlDOMW', 5, NULL, '2018-02-19 16:56:34', '2018-02-19 19:58:26', NULL);
INSERT INTO users (id, enrollment, name, username, password, level_id, remember_token, created_at, updated_at, deleted_at) VALUES (38, '574899', 'Ana Lucía Sepúlveda Leos', 'ana.lucia', '$2y$10$hyDjSLG094G4.bl1Ka6TK.WBDgRaj2SZqrseT1U72dv/MBJEH/21G', 4, NULL, '2018-02-19 16:55:18', '2018-02-19 16:55:18', NULL);
INSERT INTO users (id, enrollment, name, username, password, level_id, remember_token, created_at, updated_at, deleted_at) VALUES (34, '574895', 'Eugenia Dillón Cavazos', 'eugenia.dillon', '$2y$10$psXAuIry01ppaVAPVGse3uu6ku5ME20SA46rcRZII3VlgK/l1CpsW', 5, 'MUSOFef1YjRoh5lXeKqEVIbAwD0IW4ysnEJ67NSRjoRQ3C72hZKLGYwxkdm8', '2018-02-19 16:53:24', '2018-02-19 16:53:24', NULL);
INSERT INTO users (id, enrollment, name, username, password, level_id, remember_token, created_at, updated_at, deleted_at) VALUES (4, '141639', 'Luz Cristina Guerra González', 'luz.cristina', '$2y$10$nOAvqktMLRutMxyUmrkoaOG5m5zTSoq0rybnnLqwClgoHVkKTx1/K', 2, NULL, '2018-02-19 16:29:25', '2018-02-19 16:41:19', NULL);
INSERT INTO users (id, enrollment, name, username, password, level_id, remember_token, created_at, updated_at, deleted_at) VALUES (5, '150334', 'Talhía Lissette González Floresparra', 'talhia.lissette', '$2y$10$IvkQH2LIGDoqjU6NI4y5s.7DMIYuAPMVnpwui1eLVFQEV3/rjl37C', 3, NULL, '2018-02-19 16:41:47', '2018-02-19 16:41:47', NULL);
INSERT INTO users (id, enrollment, name, username, password, level_id, remember_token, created_at, updated_at, deleted_at) VALUES (6, '170924', 'Alejandra Huerta Lecea', 'alejandra.huerta', '$2y$10$kfNVM3XJtur.1DEKf4qr5u9AWx727DpCljqztf8FhzJBIB.NJBvR.', 3, NULL, '2018-02-19 16:42:15', '2018-02-19 16:42:15', NULL);
INSERT INTO users (id, enrollment, name, username, password, level_id, remember_token, created_at, updated_at, deleted_at) VALUES (7, '141636', 'Cristina Herrera Alamilla', 'cristina.herrera', '$2y$10$LhSLfUUca5SZc25Wl90zVOQVOShsAro/RojPum0YiiUYJJmjZ/Zc6', 2, NULL, '2018-02-19 16:42:37', '2018-02-19 16:42:37', NULL);
INSERT INTO users (id, enrollment, name, username, password, level_id, remember_token, created_at, updated_at, deleted_at) VALUES (8, '229028', 'Beatriz Eugenia Peña García', 'beatriz.eugenia', '$2y$10$7VlwOqGciBoEbAqoU2ttzOBUGkb30SiEhWciL92BfJWukI.BEOjd2', 3, NULL, '2018-02-19 16:42:59', '2018-02-19 16:42:59', NULL);
INSERT INTO users (id, enrollment, name, username, password, level_id, remember_token, created_at, updated_at, deleted_at) VALUES (9, '286269', 'Nallely García Avila', 'nallely.garcia', '$2y$10$MB9N8rT1YSvr.W3QwBqTuOMelA7WtYv9btIZ8WTcIfRO9EHKD.Zym', 3, NULL, '2018-02-19 16:43:24', '2018-02-19 16:43:24', NULL);
INSERT INTO users (id, enrollment, name, username, password, level_id, remember_token, created_at, updated_at, deleted_at) VALUES (10, '286268', 'Martín Alfonso García Vargas', 'martin.alfonso', '$2y$10$fQIl0EO179AoboOruS91EejewiGtKXjtTufFTlXspN7KexKTI8QDS', 2, NULL, '2018-02-19 16:43:44', '2018-02-19 16:43:44', NULL);
INSERT INTO users (id, enrollment, name, username, password, level_id, remember_token, created_at, updated_at, deleted_at) VALUES (11, '313907', 'Pablo Ramos de la Garza', 'pablo.ramos', '$2y$10$3lDaift7utarrktUE385GuKmYSjThMYjm1SJC5LGda.R2dXt9okqq', 3, NULL, '2018-02-19 16:44:03', '2018-02-19 16:44:03', NULL);
INSERT INTO users (id, enrollment, name, username, password, level_id, remember_token, created_at, updated_at, deleted_at) VALUES (12, '286272', 'Jesica Bortoni Evans', 'jesica.bortoni', '$2y$10$de/rblca8/puPB4RhV6SG.SMeFDCa2jFzEsAACQfv.CaZNWVzHsp6', 2, NULL, '2018-02-19 16:44:27', '2018-02-19 16:44:27', NULL);
INSERT INTO users (id, enrollment, name, username, password, level_id, remember_token, created_at, updated_at, deleted_at) VALUES (13, '335668', 'Ricardo Javier Jiménez Galván', 'ricardo.javier', '$2y$10$94i9t7F0AK07r.hpWeGmw.rFZ9xJMuh6grMlVu697MUX7D/w4fI9S', 2, NULL, '2018-02-19 16:44:53', '2018-02-19 16:44:53', NULL);
INSERT INTO users (id, enrollment, name, username, password, level_id, remember_token, created_at, updated_at, deleted_at) VALUES (14, '335669', 'Brenda Lizeth Sabino Ortíz', 'brenda.lizeth', '$2y$10$bVdFEbw57oQGUseot/Oaq.EeObendUeMVSFWjur2lIHLfkp7q3RMC', 3, NULL, '2018-02-19 16:45:14', '2018-02-19 16:45:14', NULL);
INSERT INTO users (id, enrollment, name, username, password, level_id, remember_token, created_at, updated_at, deleted_at) VALUES (15, '356488', 'Luis Daniel Tijerina Cuevas', 'luis.daniel', '$2y$10$bytE9EqPzOUma3ge60uKBOLU1aqSgytB9xNLa2YJa5iwEawV4qQLC', 3, NULL, '2018-02-19 16:45:36', '2018-02-19 16:45:36', NULL);
INSERT INTO users (id, enrollment, name, username, password, level_id, remember_token, created_at, updated_at, deleted_at) VALUES (16, '357420', 'Aidée Sousa Solís', 'aidee.sousa', '$2y$10$PtUGdn4dtkJsSW/GW5uRU.yVrmlQOY4GN3cGGSKt23UG/JR68QaOW', 2, NULL, '2018-02-19 16:46:01', '2018-02-19 16:46:01', NULL);
INSERT INTO users (id, enrollment, name, username, password, level_id, remember_token, created_at, updated_at, deleted_at) VALUES (18, '319046', 'Laura Beatriz Argüello del Villar', 'laura.beatriz', '$2y$10$HOgrCOcH928qSQ8VpgKNXeMQollkpD/4MV7KXZWKk1L1u8qrg0VFq', 3, NULL, '2018-02-19 16:46:37', '2018-02-19 16:46:37', NULL);
INSERT INTO users (id, enrollment, name, username, password, level_id, remember_token, created_at, updated_at, deleted_at) VALUES (19, '519959', 'Cecilia Cortazar', 'cecilia.cortazar', '$2y$10$2ekMgB6qpoKmqzd2H1jhgObSH5rQy8XnmgZz0GaBjm0P6wUaazid2', 3, NULL, '2018-02-19 16:47:01', '2018-02-19 16:47:01', NULL);
INSERT INTO users (id, enrollment, name, username, password, level_id, remember_token, created_at, updated_at, deleted_at) VALUES (20, '336911', 'Jorge Sebastian', 'jorge.sebastian', '$2y$10$2bP.OcLXpePwGQS9qhbhp.h3qlovELnie3lkx4MM2kue7KL3ebMja', 2, NULL, '2018-02-19 16:47:26', '2018-02-19 16:47:26', NULL);
INSERT INTO users (id, enrollment, name, username, password, level_id, remember_token, created_at, updated_at, deleted_at) VALUES (21, '501612', 'Diego Alejandro De León Reyes', 'diego.alejandro', '$2y$10$6khfpQOib52u2x5pTvMN4elAiHsDc7PY6ScqAQLHVikKytj9KSWpu', 3, NULL, '2018-02-19 16:47:50', '2018-02-19 16:47:50', NULL);
INSERT INTO users (id, enrollment, name, username, password, level_id, remember_token, created_at, updated_at, deleted_at) VALUES (22, '504144', 'Rubén Orlando Gómez Silva', 'ruben.orlando', '$2y$10$pezPUHNo3b0KbXXJeY1vruJZQAsvysmMtV4ELkApo8Mgb4HUwHNvG', 3, NULL, '2018-02-19 16:48:08', '2018-02-19 16:48:08', NULL);
INSERT INTO users (id, enrollment, name, username, password, level_id, remember_token, created_at, updated_at, deleted_at) VALUES (23, '502065', 'Jannet Barrios Martínez', 'jannet.barrios', '$2y$10$ANn1hV0qeYeodt7tDcREi.cJxTXeRL5JM3Gvh5ufFqHTl2Xjxe5qa', 3, NULL, '2018-02-19 16:48:24', '2018-02-19 16:48:24', NULL);
INSERT INTO users (id, enrollment, name, username, password, level_id, remember_token, created_at, updated_at, deleted_at) VALUES (24, '189782', 'Fernando Guerra', 'fernando.guerra', '$2y$10$uBi0KNZEhx0WWx/ErYIAKOM/Kswji1P0VUCAJZv2oB9a32qN1yaYe', 3, NULL, '2018-02-19 16:48:42', '2018-02-19 16:48:42', NULL);
INSERT INTO users (id, enrollment, name, username, password, level_id, remember_token, created_at, updated_at, deleted_at) VALUES (25, '150318', 'Aleyda Rivera Soto', 'aleyda.rivera', '$2y$10$qIvN1iKerj.80FRbSP3U0uRg32xayNuQF.5a8JwQCw6FxCXG/0uzS', 3, NULL, '2018-02-19 16:49:17', '2018-02-19 16:49:17', NULL);
INSERT INTO users (id, enrollment, name, username, password, level_id, remember_token, created_at, updated_at, deleted_at) VALUES (26, '585261', 'Vanessa Dibani Cabello Leal', 'vanessa.dibani', '$2y$10$ZelZJ0PFF9zZgLLGg7qiLOqtIt2yWlhAv2ZUKsQ56ed3sshjuWjZK', 5, NULL, '2018-02-19 16:50:09', '2018-02-19 16:50:09', NULL);
INSERT INTO users (id, enrollment, name, username, password, level_id, remember_token, created_at, updated_at, deleted_at) VALUES (27, '585262', 'Marcelo García González', 'marcelo.garcia', '$2y$10$iA3zOoTO8zwLVjCJMXUseuzwx44bXFS6k6epzRavOWpzrA95Rxl7G', 4, NULL, '2018-02-19 16:50:29', '2018-02-19 16:50:29', NULL);
INSERT INTO users (id, enrollment, name, username, password, level_id, remember_token, created_at, updated_at, deleted_at) VALUES (28, '585263', 'Mario Abraham Arellano Rocha', 'mario.abraham', '$2y$10$e7h8Vx4Sy1ojDPXF9sYgPelW5YojrUZTTrOTjBaar5WxS0a56N58u', 5, NULL, '2018-02-19 16:50:47', '2018-02-19 16:50:47', NULL);
INSERT INTO users (id, enrollment, name, username, password, level_id, remember_token, created_at, updated_at, deleted_at) VALUES (29, '585264', 'Jesús Eduardo Longoria Rodíguez', 'jesus.eduardo', '$2y$10$kx2fSQwZE3kRnTN8dJfF5OCc/OCTc6dL78TXNBDQueRIP/v7aBPBS', 4, NULL, '2018-02-19 16:51:10', '2018-02-19 16:51:10', NULL);
INSERT INTO users (id, enrollment, name, username, password, level_id, remember_token, created_at, updated_at, deleted_at) VALUES (30, '567031', 'Ignacio Andrés Vega Palacios', 'ignacio.andres', '$2y$10$vfyGzWY1etx1NS6Os7N8eefQBYQ.DvLx.JWjDyRrLTkQvxbtYt4q.', 6, NULL, '2018-02-19 16:51:29', '2018-02-19 16:51:29', NULL);
INSERT INTO users (id, enrollment, name, username, password, level_id, remember_token, created_at, updated_at, deleted_at) VALUES (31, '585265', 'Sergio Eliud Maldonado Fraga', 'sergio.eliud', '$2y$10$6VZy08Vx7m9Yim0Q.9L7K.tm2F6q0/YLQGddFPVBO5deEwpMlYtDu', 4, NULL, '2018-02-19 16:51:46', '2018-02-19 16:51:46', NULL);
INSERT INTO users (id, enrollment, name, username, password, level_id, remember_token, created_at, updated_at, deleted_at) VALUES (32, '585266', 'Enrique Alberto de la Rosa Tijerina', 'enrique.alberto', '$2y$10$v9fhvGOZsDQ9pMS0fjSZne6APs4n38boOd4tEHfVyyX/cLgvZaHvW', 4, NULL, '2018-02-19 16:52:05', '2018-02-19 16:52:05', NULL);
INSERT INTO users (id, enrollment, name, username, password, level_id, remember_token, created_at, updated_at, deleted_at) VALUES (33, '574894', 'Isabel Cristina Kann Abreu', 'isabel.cristina', '$2y$10$L.b3KuZGaPH3553.SQm8iu5M1FZ9PZoUXn.IfV4OBjtDS60U8sR3i', 5, NULL, '2018-02-19 16:53:04', '2018-02-19 16:53:04', NULL);
INSERT INTO users (id, enrollment, name, username, password, level_id, remember_token, created_at, updated_at, deleted_at) VALUES (39, '574900', 'Carla Decanini Villaseñor', 'carla.decanini', '$2y$10$xSZtrFIb5/VryGxCuXkLfeagV7Hjqc4h5i3E36ve3o2MiS.NA.K.y', 6, NULL, '2018-02-19 16:55:39', '2018-02-19 16:55:39', NULL);
INSERT INTO users (id, enrollment, name, username, password, level_id, remember_token, created_at, updated_at, deleted_at) VALUES (40, '574901', 'Adrián Guerrero Castillo', 'adrian.guerrero', '$2y$10$.Kkv7yw2vDlpVPQKAeIhXO0vsC5UAvvn6USCb3Im2kVuinRlnsYPa', 4, NULL, '2018-02-19 16:56:00', '2018-02-19 16:56:00', NULL);
INSERT INTO users (id, enrollment, name, username, password, level_id, remember_token, created_at, updated_at, deleted_at) VALUES (41, '574902', 'Roxana Conde Castillo', 'roxana.conde', '$2y$10$Lbr5QVd77S5kcdO6XtwBm.15kSZ5gMB5GiqTFi1AwebutiqRkfYsq', 4, NULL, '2018-02-19 16:56:16', '2018-02-19 16:56:16', NULL);
INSERT INTO users (id, enrollment, name, username, password, level_id, remember_token, created_at, updated_at, deleted_at) VALUES (44, '569157', 'Rogelio Noé Chávez Carrillo', 'rogelio.noe', '$2y$10$WTWpxZQDmln9E5OfVUJkCedCLhLuJAEyWLTPy8WJmqlFYl6sq3mca', 4, NULL, '2018-02-19 16:57:11', '2018-02-19 16:57:11', NULL);
INSERT INTO users (id, enrollment, name, username, password, level_id, remember_token, created_at, updated_at, deleted_at) VALUES (45, '551448', 'Alán Darien Pérez Martínez', 'alan.darien', '$2y$10$sk6VVDDeDafLtNXyLBKEkebVF6cgNJ42ZEN3blDI2oAaJUeJjHsTG', 6, NULL, '2018-02-19 16:57:28', '2018-02-19 16:57:28', NULL);
INSERT INTO users (id, enrollment, name, username, password, level_id, remember_token, created_at, updated_at, deleted_at) VALUES (46, '551425', 'Josué Jesús Santoyo Saucedo', 'josue.jesus', '$2y$10$a7uMJ9wDsQ0IrhXoh2QcBevaoA.yZTyMO8qYJ.Qu2RBh.XJtY.Ua2', 6, NULL, '2018-02-19 16:57:44', '2018-02-19 16:57:44', NULL);
INSERT INTO users (id, enrollment, name, username, password, level_id, remember_token, created_at, updated_at, deleted_at) VALUES (43, '574904', 'Paolo Carrillo Almaguer', 'paolo.carrillo', '$2y$10$sAMdxgqc0AvKya7ZDZGaReaQwRa83Y8SGef84t6eKPhHRiaHUlICy', 6, 'er0NtpAaafLfq7tDmn1KQwmAJkn32hz035rBFRdhclPD5O6An6erZi4htQpO', '2018-02-19 16:56:54', '2018-02-19 16:56:54', NULL);
INSERT INTO users (id, enrollment, name, username, password, level_id, remember_token, created_at, updated_at, deleted_at) VALUES (17, '261355', 'Héctor Emanuel Alonso Cortés', 'hector.emanuel', '$2y$10$1IqXfOOeKiMQiNSo57XyYu9/P3hKh/V16HlWXQF4nPQnFt2bl4Zla', 3, NULL, '2018-02-19 16:46:19', '2018-02-19 19:58:35', NULL);
INSERT INTO users (id, enrollment, name, username, password, level_id, remember_token, created_at, updated_at, deleted_at) VALUES (1, NULL, 'admin', 'admin', '$2y$10$osa1OwuUMH.sHHNpz30sTOiI2nTKtg24E51AF7vA1ySb5YhardvKW', NULL, 'xyV1LGnXgwWKgpOWfuXj6tT5yEsiq6zMuD1k4Tf9BS8EgXPM7VTul2A5z3bV', '2018-02-19 15:34:16', '2018-02-19 15:34:16', NULL);
INSERT INTO users (id, enrollment, name, username, password, level_id, remember_token, created_at, updated_at, deleted_at) VALUES (47, '561129', 'Vanessa Rodríguez Gutiérrez', 'vanessa.rodriguez', '$2y$10$DM4HIfU61VOTkuAAVp9l7ON74jIQoXzUxPKj3xyAhq31cVP5oM.TG', 4, NULL, '2018-02-19 16:58:00', '2018-02-19 16:58:00', NULL);
INSERT INTO users (id, enrollment, name, username, password, level_id, remember_token, created_at, updated_at, deleted_at) VALUES (48, '561130', 'Celia Denis Ramos Tijerina', 'celia.denis', '$2y$10$y0dlikqVAABJpKOtoR4Fsuew9l1TTiEm7VLxib57cgcoS39gbOh3G', 4, NULL, '2018-02-19 16:58:17', '2018-02-19 16:58:17', NULL);
INSERT INTO users (id, enrollment, name, username, password, level_id, remember_token, created_at, updated_at, deleted_at) VALUES (49, '561613', 'Andrea González Mackay', 'andrea.gonzalez', '$2y$10$3Qm13zqWXg.yzbBvcqPHOu9fqU/ye7mkjzFs87WrBkLWe/qH9zlS.', 4, NULL, '2018-02-19 16:58:33', '2018-02-19 16:58:33', NULL);
INSERT INTO users (id, enrollment, name, username, password, level_id, remember_token, created_at, updated_at, deleted_at) VALUES (50, '558732', 'Monsterrat Ortiz Robles', 'montserrat.ortiz', '$2y$10$INnUZC4CHfOZ.fagraljXOtV41.50cR6DTSC0nafx.AHMNVWyxhHq', 5, NULL, '2018-02-19 16:58:52', '2018-02-19 16:58:52', NULL);
INSERT INTO users (id, enrollment, name, username, password, level_id, remember_token, created_at, updated_at, deleted_at) VALUES (52, '549602', 'José Abraham Ramírez Guevara', 'jose.abraham', '$2y$10$ImlYz01/YWiZWK2C3i/cX.kTHzGKv4oqj6/GxnatogUlSRUhrxCnK', 5, NULL, '2018-02-19 16:59:21', '2018-02-19 16:59:21', NULL);
INSERT INTO users (id, enrollment, name, username, password, level_id, remember_token, created_at, updated_at, deleted_at) VALUES (53, '551364', 'Kandy Scarlett Cabrera Mtz.', 'kandy.scarlett', '$2y$10$5RtyiHuhKo9c/aRQ4wIb4uvf0l0WMRRaXQCTxN8aj.JVhWMS/OMc6', 4, NULL, '2018-02-19 16:59:39', '2018-02-19 16:59:39', NULL);
INSERT INTO users (id, enrollment, name, username, password, level_id, remember_token, created_at, updated_at, deleted_at) VALUES (54, '560236', 'Manuel Juárez Andrade', 'manuel.juarez', '$2y$10$FYK7qAohRa9puYYQbqApC.MOyc7N6g.UG5sOg9Kw3JxOxCL8a/obi', 6, NULL, '2018-02-19 16:59:58', '2018-02-19 16:59:58', NULL);
INSERT INTO users (id, enrollment, name, username, password, level_id, remember_token, created_at, updated_at, deleted_at) VALUES (55, '541721', 'Blanca Leticia Treviño García', 'blanca.leticia', '$2y$10$hez19GctcKUjAODVDWGz/uGD5n0gXS2TBRriA2Yd/f5fZHOK8Sdw6', 4, NULL, '2018-02-19 17:00:14', '2018-02-19 17:00:14', NULL);
INSERT INTO users (id, enrollment, name, username, password, level_id, remember_token, created_at, updated_at, deleted_at) VALUES (56, '336127', 'Diana Teresita Mejía Barrera', 'diana.teresita', '$2y$10$dKnt295Z95TDktkxglY3U.Xg2GoMemZQKcpCQBnie0HWAk4qKZmJW', 6, NULL, '2018-02-19 17:00:30', '2018-02-19 17:00:30', NULL);
INSERT INTO users (id, enrollment, name, username, password, level_id, remember_token, created_at, updated_at, deleted_at) VALUES (57, '542034', 'Liliana Margarita Elizondo Chávez', 'liliana.margarita', '$2y$10$9NCXrRnvU0O3sJM8GswUQeH/ZXnrVoH1QEKn../4n0T3P.tvFRFGC', 4, NULL, '2018-02-19 17:00:48', '2018-02-19 17:00:48', NULL);
INSERT INTO users (id, enrollment, name, username, password, level_id, remember_token, created_at, updated_at, deleted_at) VALUES (58, '544401', 'Luisa Fernanda Reyna Arroyo', 'luisa.fernanda', '$2y$10$NGDcX8UzUQowjyJpdVH35OeOlzh.uY4l5IZzETOj4pXPBSDOtHW32', 5, NULL, '2018-02-19 17:01:08', '2018-02-19 17:01:08', NULL);
INSERT INTO users (id, enrollment, name, username, password, level_id, remember_token, created_at, updated_at, deleted_at) VALUES (59, '544167', 'Ramiro Isla Quiroz', 'ramiro.isla', '$2y$10$sQ85HhaDLDXNMdV1t0.nXeKFOGWgLTjiwE.boL2iHusyxgEJ6Bu26', 6, NULL, '2018-02-19 17:01:24', '2018-02-19 17:01:24', NULL);
INSERT INTO users (id, enrollment, name, username, password, level_id, remember_token, created_at, updated_at, deleted_at) VALUES (60, '545154', 'Samuel Valenzuela Benezra', 'samuel.valenzuela', '$2y$10$zOTGvgPS5S4KJetAMLA9JeLLNBl1jFkFTg6U.dwMca55qWP0yP5R.', 6, NULL, '2018-02-19 17:01:42', '2018-02-19 17:01:42', NULL);
INSERT INTO users (id, enrollment, name, username, password, level_id, remember_token, created_at, updated_at, deleted_at) VALUES (61, '547349', 'Mauricio Alberto Zárate Flores', 'mauricio.alberto', '$2y$10$qbUtaTvdUgfCr4TKs9/kveuLGG9AkNzBWwP5QTLl/lpbTZ99s38hO', 5, NULL, '2018-02-19 17:01:59', '2018-02-19 17:01:59', NULL);
INSERT INTO users (id, enrollment, name, username, password, level_id, remember_token, created_at, updated_at, deleted_at) VALUES (62, '548433', 'Raymundo Rivera Garza', 'raymundo.rivera', '$2y$10$j3N1uW3kgmfK7Xd7wzo/.eGGvSABJQgFWwsxUwbMlZc1WtlWMq7j.', 6, NULL, '2018-02-19 17:03:56', '2018-02-19 17:03:56', NULL);
INSERT INTO users (id, enrollment, name, username, password, level_id, remember_token, created_at, updated_at, deleted_at) VALUES (63, '550068', 'Luis Eduardo Cantú Villarreal', 'luis.eduardo', '$2y$10$6xxPoeVYp7Hxd5uIZGz7yOuHEjdvaVvDCLr0MUmEzT4hSpHr3xLIu', 6, NULL, '2018-02-19 17:04:10', '2018-02-19 17:04:10', NULL);
INSERT INTO users (id, enrollment, name, username, password, level_id, remember_token, created_at, updated_at, deleted_at) VALUES (64, '525528', 'Nancy Patricia Leal Salazar', 'nancy.patricia', '$2y$10$rn1DnuSl1sjnNrv9/FkJlOS3zXkKGU9N9kCrE6VdCXwEB.hxu1u3y', 6, NULL, '2018-02-19 17:06:52', '2018-02-19 17:06:52', NULL);
INSERT INTO users (id, enrollment, name, username, password, level_id, remember_token, created_at, updated_at, deleted_at) VALUES (65, '339643', 'Juan Pablo Chapa Vera', 'juan.pablo', '$2y$10$0LdrvdRmS7HyQpNphEnbGu3.9ggf4RU.JJBY4Hbi/Yuo.c2jBu6uu', 6, NULL, '2018-02-19 17:07:07', '2018-02-19 17:07:07', NULL);
INSERT INTO users (id, enrollment, name, username, password, level_id, remember_token, created_at, updated_at, deleted_at) VALUES (66, '541755', 'Ma. De los Angeles Ortiz Miller', 'maria.angeles', '$2y$10$W12p/B/q6bq60kP1bbhK8O0L9Q5GMI2nIUCLxV1855Ps1nRpDOL8u', 4, NULL, '2018-02-19 17:07:28', '2018-02-19 17:07:28', NULL);
INSERT INTO users (id, enrollment, name, username, password, level_id, remember_token, created_at, updated_at, deleted_at) VALUES (67, '523003', 'Martha Yazmin Lozano Pérez', 'martha.yazmin', '$2y$10$JbrGeT4B7I5V/TKWpoEgYe87OwR2JWfccV9hFT9iQFY2aBbvwZ9py', 4, NULL, '2018-02-19 17:07:46', '2018-02-19 17:07:46', NULL);
INSERT INTO users (id, enrollment, name, username, password, level_id, remember_token, created_at, updated_at, deleted_at) VALUES (68, '533763', 'Ari Armando Marines Bernal', 'ari.armando', '$2y$10$vP74fhe/WGKRpUayjGaqeO5KVTuBDzhPDKqV4zfpHsaUybwPSqmxW', 6, NULL, '2018-02-19 17:08:13', '2018-02-19 17:08:13', NULL);
INSERT INTO users (id, enrollment, name, username, password, level_id, remember_token, created_at, updated_at, deleted_at) VALUES (69, '521173', 'Carla Andrea Galvez Hernández', 'carla.andrea', '$2y$10$04A.bEblZu6sLrU3aG2ieufmxpDqcs2.BMxJL4jnfLaPVqGwMdkp2', 4, NULL, '2018-02-19 17:08:30', '2018-02-19 17:08:30', NULL);
INSERT INTO users (id, enrollment, name, username, password, level_id, remember_token, created_at, updated_at, deleted_at) VALUES (51, '548407', 'Alberto Eduardo Zambrano Ramírez', 'alberto.eduardo', '$2y$10$gT1pqT4u/UsshEw8NAYFF.jhQPJ.XA9L6rLxGPd7CvkSnRm.UxJ0K', 5, NULL, '2018-02-19 16:59:07', '2018-02-19 17:33:04', NULL);
INSERT INTO users (id, enrollment, name, username, password, level_id, remember_token, created_at, updated_at, deleted_at) VALUES (73, NULL, 'Gerardo Tamayo  Landois', 'gerardo', '$2y$10$iixh5C2NlXyAPtqJO7RFL.cfNDIXrcQq1fpuuRSZmQNCFVolG4bpO', NULL, NULL, '2018-02-19 17:50:10', '2018-02-19 17:50:10', NULL);
INSERT INTO users (id, enrollment, name, username, password, level_id, remember_token, created_at, updated_at, deleted_at) VALUES (74, NULL, 'Sujei Chandeck Rodriguez', 'sujei', '$2y$10$MFXLCoDR8k/QZqDj6Bn4d.YkXow0krZF/N6y3YKsLrCjngQf.lpP6', NULL, NULL, '2018-02-19 17:50:25', '2018-02-19 17:50:40', NULL);
INSERT INTO users (id, enrollment, name, username, password, level_id, remember_token, created_at, updated_at, deleted_at) VALUES (82, NULL, 'Verónica Guadalupe  Olivares Garza', 'veronica', '$2y$10$i.bMFU7kDqLXGh0.BOb7LOIy9HwSZ2C6MS73EfzeMiaQLootLG8iu', NULL, NULL, '2018-02-19 17:53:13', '2018-02-19 17:53:13', NULL);
INSERT INTO users (id, enrollment, name, username, password, level_id, remember_token, created_at, updated_at, deleted_at) VALUES (84, NULL, 'Migdalin Melchor Aranda', 'migdalin', '$2y$10$ij88WaCteTK/YSY8ExF2FuMs26mlDVh6NgGNOzNybNyjErNj20zN.', NULL, NULL, '2018-02-19 17:53:46', '2018-02-19 17:53:46', NULL);
INSERT INTO users (id, enrollment, name, username, password, level_id, remember_token, created_at, updated_at, deleted_at) VALUES (80, NULL, 'Jaime Francisco Álvarez Reyes', 'jaime.teatro', '$2y$10$ri4qKLVzkVowz47cdsgvoew1X05rMcUM0/onSUQ29bO5XyFkg7Op6', NULL, NULL, '2018-02-19 17:52:45', '2018-02-19 19:29:33', NULL);
INSERT INTO users (id, enrollment, name, username, password, level_id, remember_token, created_at, updated_at, deleted_at) VALUES (85, NULL, 'Tamem Tafich Canavati', 'tamem.matematicas', '$2y$10$ejCz218gKdMaabMnHuXW0urq3OCyjCOsebo2x/U2z.mZg8li4pqtu', NULL, NULL, '2018-02-19 17:54:13', '2018-02-19 19:28:08', NULL);
INSERT INTO users (id, enrollment, name, username, password, level_id, remember_token, created_at, updated_at, deleted_at) VALUES (83, NULL, 'José Luis García Lugo', 'jose.luis', '$2y$10$RskHcU1xw7DLBFUEdO1bSOoxFXnNxAhP4MttI28NrSQH0m/JMKIju', NULL, NULL, '2018-02-19 17:53:31', '2018-02-19 19:30:30', NULL);
INSERT INTO users (id, enrollment, name, username, password, level_id, remember_token, created_at, updated_at, deleted_at) VALUES (78, NULL, 'Flor Teresa Morales Madera', 'flor.teresa', '$2y$10$t8ungo594w7uXSCDnybJ0.leznOfByfySq7JuGmmupYfm5IkrmvJu', NULL, 'ARNAPptGCvL8sNU6KAD9ZzirPGS3rTD5IxR5zNbcJA729de8wjoaTQ9j2Ovr', '2018-02-19 17:52:11', '2018-02-19 19:30:49', NULL);
INSERT INTO users (id, enrollment, name, username, password, level_id, remember_token, created_at, updated_at, deleted_at) VALUES (86, NULL, 'Humberto Sáenz Torres', 'humberto.artes', '$2y$10$4w1asbc4GfgKDGbXxAnFBODQtsWCo35RRap2U6qUTtSLTfJT0JMuG', NULL, 'EcwwcQbyzzpPPHy4yJypTLBWFeb1lpMrAzRWGV576L3wwxTTM9kVv7XbKpCG', '2018-02-19 18:16:10', '2018-02-19 19:28:00', NULL);
INSERT INTO users (id, enrollment, name, username, password, level_id, remember_token, created_at, updated_at, deleted_at) VALUES (81, NULL, 'Anelisa Ayala Contel', 'anelisa.competencias', '$2y$10$8f0t.wEzHPat3agR/fj/5.hAR2QD0EfTylpMwLaIehh4P/c1TpH6C', NULL, NULL, '2018-02-19 17:53:00', '2018-02-19 19:28:48', NULL);
INSERT INTO users (id, enrollment, name, username, password, level_id, remember_token, created_at, updated_at, deleted_at) VALUES (79, NULL, 'María Guadalupe Cepeda Jiménez', 'maria.guadalupe', '$2y$10$QNWVF4LQqut0SESmv2579.O/c6ILD4MytjMNo2jBKdI2A4Am92ErS', NULL, NULL, '2018-02-19 17:52:29', '2018-02-19 19:30:09', NULL);
INSERT INTO users (id, enrollment, name, username, password, level_id, remember_token, created_at, updated_at, deleted_at) VALUES (75, NULL, 'Víctor Martínez Rangel', 'victor.taller', '$2y$10$eBjpkff0rZpUIknjpAvNAef/E2wvYc...TpqBgQ.lwCMMIFsgDlHG', NULL, 'OPn5JZLCDv5WQV7rCGvPGVIx6jrCLBBwBtSSM96cd6HQAsreLHg4kJvOkdLp', '2018-02-19 17:51:11', '2018-02-19 19:32:03', NULL);
INSERT INTO users (id, enrollment, name, username, password, level_id, remember_token, created_at, updated_at, deleted_at) VALUES (72, NULL, 'María José Granados Hernández', 'maria.jose', '$2y$10$CDTGBB4xFRNHGHmZ4qAveOlFv0RXgM5Z/02pRNcpjCNpOEf3i0rUa', NULL, NULL, '2018-02-19 17:49:45', '2018-02-19 19:34:26', NULL);
INSERT INTO users (id, enrollment, name, username, password, level_id, remember_token, created_at, updated_at, deleted_at) VALUES (71, NULL, 'José Rodrigo Trujillo Guevara', 'jose.rodrigo', '$2y$10$4/mwBi5gTRO9CY0S0fezuuw9gPIFyXnRTktHjJguLuG2.0fxPu80C', NULL, NULL, '2018-02-19 17:49:26', '2018-02-19 19:34:57', NULL);
INSERT INTO users (id, enrollment, name, username, password, level_id, remember_token, created_at, updated_at, deleted_at) VALUES (70, NULL, 'Crishna Didilia Balderas Moreno', 'crishna.tta', '$2y$10$YG3M7fEkUohvLf6PFR1ivOPEOxoTAVO.hkhU7YXOVk.fvWH7XyuL.', NULL, NULL, '2018-02-19 17:48:58', '2018-02-19 19:36:19', NULL);
INSERT INTO users (id, enrollment, name, username, password, level_id, remember_token, created_at, updated_at, deleted_at) VALUES (77, NULL, 'Amelia Guadalupe Rivera Ríos', 'amelia.comunicación', '$2y$10$PrpJndNoNvut0JJWlOM0TeNNthrk.BrHFUl7jvPJcy3fmCiwRNCGi', NULL, 'RZuGdLWubwRtaHDFwBEFeTwbxVOmEoialIVit2DW68ncwl3YkZXCa0OWytwj', '2018-02-19 17:51:54', '2018-02-19 19:31:15', NULL);
INSERT INTO users (id, enrollment, name, username, password, level_id, remember_token, created_at, updated_at, deleted_at) VALUES (76, NULL, 'Nancy Elizabeth González Brambila', 'nancy.elizabeth', '$2y$10$YaNmBuFmUlxYsRtNOx1Nu.8cIHqh4Q4jLvxrg3TjwxYAgRU6ldAtC', NULL, 'C6nUwtz9QgIw9Hs03PkUsQ65UiFSjvpNhxDvudvhurTPguZeo021Kh3xhRWm', '2018-02-19 17:51:36', '2018-02-19 19:31:38', NULL);


--
-- Name: users_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('users_id_seq', 86, true);


--
-- Name: cualitative_grades cualitative_grades_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY cualitative_grades
    ADD CONSTRAINT cualitative_grades_pkey PRIMARY KEY (id);


--
-- Name: grades grades_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY grades
    ADD CONSTRAINT grades_pkey PRIMARY KEY (id);


--
-- Name: grades grades_student_id_group_id_partial_id_unique; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY grades
    ADD CONSTRAINT grades_student_id_group_id_partial_id_unique UNIQUE (student_id, group_id, partial_id);


--
-- Name: group_student group_student_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY group_student
    ADD CONSTRAINT group_student_pkey PRIMARY KEY (group_id, user_id);


--
-- Name: group_teacher group_teacher_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY group_teacher
    ADD CONSTRAINT group_teacher_pkey PRIMARY KEY (group_id, user_id);


--
-- Name: groups groups_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY groups
    ADD CONSTRAINT groups_pkey PRIMARY KEY (id);


--
-- Name: levels levels_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY levels
    ADD CONSTRAINT levels_pkey PRIMARY KEY (id);


--
-- Name: migrations migrations_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY migrations
    ADD CONSTRAINT migrations_pkey PRIMARY KEY (id);


--
-- Name: partials partials_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY partials
    ADD CONSTRAINT partials_pkey PRIMARY KEY (id);


--
-- Name: permission_role permission_role_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY permission_role
    ADD CONSTRAINT permission_role_pkey PRIMARY KEY (permission_id, role_id);


--
-- Name: permissions permissions_name_unique; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY permissions
    ADD CONSTRAINT permissions_name_unique UNIQUE (name);


--
-- Name: permissions permissions_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY permissions
    ADD CONSTRAINT permissions_pkey PRIMARY KEY (id);


--
-- Name: role_user role_user_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY role_user
    ADD CONSTRAINT role_user_pkey PRIMARY KEY (user_id, role_id);


--
-- Name: roles roles_name_unique; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY roles
    ADD CONSTRAINT roles_name_unique UNIQUE (name);


--
-- Name: roles roles_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY roles
    ADD CONSTRAINT roles_pkey PRIMARY KEY (id);


--
-- Name: semesters semesters_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY semesters
    ADD CONSTRAINT semesters_pkey PRIMARY KEY (id);


--
-- Name: subjects subjects_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY subjects
    ADD CONSTRAINT subjects_pkey PRIMARY KEY (id);


--
-- Name: users users_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY users
    ADD CONSTRAINT users_pkey PRIMARY KEY (id);


--
-- Name: users users_username_unique; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY users
    ADD CONSTRAINT users_username_unique UNIQUE (username);


--
-- Name: password_resets_email_index; Type: INDEX; Schema: public; Owner: -
--

CREATE INDEX password_resets_email_index ON password_resets USING btree (email);


--
-- Name: grades grades_group_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY grades
    ADD CONSTRAINT grades_group_id_foreign FOREIGN KEY (group_id) REFERENCES groups(id);


--
-- Name: grades grades_homework_foreign; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY grades
    ADD CONSTRAINT grades_homework_foreign FOREIGN KEY (homework) REFERENCES cualitative_grades(id);


--
-- Name: grades grades_partial_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY grades
    ADD CONSTRAINT grades_partial_id_foreign FOREIGN KEY (partial_id) REFERENCES partials(id);


--
-- Name: grades grades_participation_foreign; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY grades
    ADD CONSTRAINT grades_participation_foreign FOREIGN KEY (participation) REFERENCES cualitative_grades(id);


--
-- Name: grades grades_punctuality_foreign; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY grades
    ADD CONSTRAINT grades_punctuality_foreign FOREIGN KEY (punctuality) REFERENCES cualitative_grades(id);


--
-- Name: grades grades_student_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY grades
    ADD CONSTRAINT grades_student_id_foreign FOREIGN KEY (student_id) REFERENCES users(id);


--
-- Name: grades grades_working_disposition_foreign; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY grades
    ADD CONSTRAINT grades_working_disposition_foreign FOREIGN KEY (working_disposition) REFERENCES cualitative_grades(id);


--
-- Name: group_student group_student_group_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY group_student
    ADD CONSTRAINT group_student_group_id_foreign FOREIGN KEY (group_id) REFERENCES groups(id);


--
-- Name: group_student group_student_user_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY group_student
    ADD CONSTRAINT group_student_user_id_foreign FOREIGN KEY (user_id) REFERENCES users(id);


--
-- Name: group_teacher group_teacher_group_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY group_teacher
    ADD CONSTRAINT group_teacher_group_id_foreign FOREIGN KEY (group_id) REFERENCES groups(id);


--
-- Name: group_teacher group_teacher_user_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY group_teacher
    ADD CONSTRAINT group_teacher_user_id_foreign FOREIGN KEY (user_id) REFERENCES users(id);


--
-- Name: groups groups_level_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY groups
    ADD CONSTRAINT groups_level_id_foreign FOREIGN KEY (level_id) REFERENCES levels(id);


--
-- Name: groups groups_semester_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY groups
    ADD CONSTRAINT groups_semester_id_foreign FOREIGN KEY (semester_id) REFERENCES semesters(id);


--
-- Name: groups groups_subject_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY groups
    ADD CONSTRAINT groups_subject_id_foreign FOREIGN KEY (subject_id) REFERENCES subjects(id);


--
-- Name: partials partials_semester_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY partials
    ADD CONSTRAINT partials_semester_id_foreign FOREIGN KEY (semester_id) REFERENCES semesters(id);


--
-- Name: permission_role permission_role_permission_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY permission_role
    ADD CONSTRAINT permission_role_permission_id_foreign FOREIGN KEY (permission_id) REFERENCES permissions(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: permission_role permission_role_role_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY permission_role
    ADD CONSTRAINT permission_role_role_id_foreign FOREIGN KEY (role_id) REFERENCES roles(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: role_user role_user_role_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY role_user
    ADD CONSTRAINT role_user_role_id_foreign FOREIGN KEY (role_id) REFERENCES roles(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: role_user role_user_user_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY role_user
    ADD CONSTRAINT role_user_user_id_foreign FOREIGN KEY (user_id) REFERENCES users(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: users users_level_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY users
    ADD CONSTRAINT users_level_id_foreign FOREIGN KEY (level_id) REFERENCES levels(id);


--
-- Name: SCHEMA public; Type: ACL; Schema: -; Owner: -
--

GRANT ALL ON SCHEMA public TO hgn;


--
-- PostgreSQL database dump complete
--

