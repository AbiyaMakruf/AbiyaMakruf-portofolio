--
-- PostgreSQL database dump
--

\restrict shF8v4pn3NJ5XGdxlrsAyVPe3cbPLmm3SMIh9u20ZeMlR7FPKhVPfcncSMpTz4n

-- Dumped from database version 17.7 (178558d)
-- Dumped by pg_dump version 17.6

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET transaction_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- Name: achievements; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.achievements (
    id bigint NOT NULL,
    title character varying(255) NOT NULL,
    description text,
    date date,
    image_path character varying(255),
    certificate_url character varying(255),
    gallery json,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


--
-- Name: achievements_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.achievements_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- Name: achievements_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE public.achievements_id_seq OWNED BY public.achievements.id;


--
-- Name: activities; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.activities (
    id bigint NOT NULL,
    title character varying(255) NOT NULL,
    content text NOT NULL,
    thumbnail_path character varying(255),
    gallery json,
    tags json,
    published_at timestamp(0) without time zone,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


--
-- Name: activities_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.activities_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- Name: activities_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE public.activities_id_seq OWNED BY public.activities.id;


--
-- Name: cache; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.cache (
    key character varying(255) NOT NULL,
    value text NOT NULL,
    expiration integer NOT NULL
);


--
-- Name: cache_locks; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.cache_locks (
    key character varying(255) NOT NULL,
    owner character varying(255) NOT NULL,
    expiration integer NOT NULL
);


--
-- Name: cv_files; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.cv_files (
    id bigint NOT NULL,
    file_path character varying(255) NOT NULL,
    public_url character varying(255),
    is_active boolean DEFAULT true NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


--
-- Name: cv_files_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.cv_files_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- Name: cv_files_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE public.cv_files_id_seq OWNED BY public.cv_files.id;


--
-- Name: educations; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.educations (
    id bigint NOT NULL,
    institution character varying(255) NOT NULL,
    degree character varying(255) NOT NULL,
    major character varying(255),
    start_date date NOT NULL,
    end_date date,
    description text,
    thumbnail_path character varying(255),
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


--
-- Name: educations_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.educations_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- Name: educations_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE public.educations_id_seq OWNED BY public.educations.id;


--
-- Name: experiences; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.experiences (
    id bigint NOT NULL,
    slug character varying(255),
    company character varying(255) NOT NULL,
    role character varying(255) NOT NULL,
    category character varying(255) DEFAULT 'Professional'::character varying NOT NULL,
    location character varying(255),
    start_date date NOT NULL,
    end_date date,
    description text,
    highlights json,
    thumbnail_path character varying(255),
    gallery json,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


--
-- Name: experiences_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.experiences_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- Name: experiences_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE public.experiences_id_seq OWNED BY public.experiences.id;


--
-- Name: failed_jobs; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.failed_jobs (
    id bigint NOT NULL,
    uuid character varying(255) NOT NULL,
    connection text NOT NULL,
    queue text NOT NULL,
    payload text NOT NULL,
    exception text NOT NULL,
    failed_at timestamp(0) without time zone DEFAULT CURRENT_TIMESTAMP NOT NULL
);


--
-- Name: failed_jobs_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.failed_jobs_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- Name: failed_jobs_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE public.failed_jobs_id_seq OWNED BY public.failed_jobs.id;


--
-- Name: job_batches; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.job_batches (
    id character varying(255) NOT NULL,
    name character varying(255) NOT NULL,
    total_jobs integer NOT NULL,
    pending_jobs integer NOT NULL,
    failed_jobs integer NOT NULL,
    failed_job_ids text NOT NULL,
    options text,
    cancelled_at integer,
    created_at integer NOT NULL,
    finished_at integer
);


--
-- Name: jobs; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.jobs (
    id bigint NOT NULL,
    queue character varying(255) NOT NULL,
    payload text NOT NULL,
    attempts smallint NOT NULL,
    reserved_at integer,
    available_at integer NOT NULL,
    created_at integer NOT NULL
);


--
-- Name: jobs_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.jobs_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- Name: jobs_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE public.jobs_id_seq OWNED BY public.jobs.id;


--
-- Name: migrations; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.migrations (
    id integer NOT NULL,
    migration character varying(255) NOT NULL,
    batch integer NOT NULL
);


--
-- Name: migrations_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.migrations_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- Name: migrations_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE public.migrations_id_seq OWNED BY public.migrations.id;


--
-- Name: password_reset_tokens; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.password_reset_tokens (
    email character varying(255) NOT NULL,
    token character varying(255) NOT NULL,
    created_at timestamp(0) without time zone
);


--
-- Name: project_images; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.project_images (
    id bigint NOT NULL,
    project_id bigint NOT NULL,
    image_path character varying(255) NOT NULL,
    caption character varying(255),
    sort_order integer DEFAULT 0 NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


--
-- Name: project_images_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.project_images_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- Name: project_images_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE public.project_images_id_seq OWNED BY public.project_images.id;


--
-- Name: projects; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.projects (
    id bigint NOT NULL,
    title character varying(255) NOT NULL,
    slug character varying(255) NOT NULL,
    short_description character varying(255) NOT NULL,
    full_description text NOT NULL,
    category character varying(255) NOT NULL,
    tech_stack json,
    github_url character varying(255),
    website_url character varying(255),
    thumbnail_path character varying(255),
    status character varying(255) DEFAULT 'draft'::character varying NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    CONSTRAINT projects_status_check CHECK (((status)::text = ANY ((ARRAY['draft'::character varying, 'published'::character varying])::text[])))
);


--
-- Name: projects_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.projects_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- Name: projects_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE public.projects_id_seq OWNED BY public.projects.id;


--
-- Name: publications; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.publications (
    id bigint NOT NULL,
    title character varying(255) NOT NULL,
    published_at date,
    doi_url character varying(255),
    certificate_image_path character varying(255),
    gallery json,
    description text,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


--
-- Name: publications_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.publications_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- Name: publications_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE public.publications_id_seq OWNED BY public.publications.id;


--
-- Name: sessions; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.sessions (
    id character varying(255) NOT NULL,
    user_id bigint,
    ip_address character varying(45),
    user_agent text,
    payload text NOT NULL,
    last_activity integer NOT NULL
);


--
-- Name: site_settings; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.site_settings (
    id bigint NOT NULL,
    key character varying(255) NOT NULL,
    value text,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


--
-- Name: site_settings_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.site_settings_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- Name: site_settings_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE public.site_settings_id_seq OWNED BY public.site_settings.id;


--
-- Name: skills; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.skills (
    id bigint NOT NULL,
    name character varying(255) NOT NULL,
    category character varying(255) NOT NULL,
    level character varying(255),
    icon_path character varying(255),
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


--
-- Name: skills_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.skills_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- Name: skills_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE public.skills_id_seq OWNED BY public.skills.id;


--
-- Name: social_links; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.social_links (
    id bigint NOT NULL,
    platform character varying(255) NOT NULL,
    url character varying(255) NOT NULL,
    icon_class character varying(255),
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    icon_path character varying(255)
);


--
-- Name: social_links_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.social_links_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- Name: social_links_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE public.social_links_id_seq OWNED BY public.social_links.id;


--
-- Name: users; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.users (
    id bigint NOT NULL,
    name character varying(255) NOT NULL,
    email character varying(255) NOT NULL,
    email_verified_at timestamp(0) without time zone,
    password character varying(255) NOT NULL,
    remember_token character varying(100),
    current_team_id bigint,
    profile_photo_path character varying(2048),
    two_factor_secret text,
    two_factor_recovery_codes text,
    two_factor_confirmed_at timestamp(0) without time zone,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


--
-- Name: users_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.users_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- Name: users_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE public.users_id_seq OWNED BY public.users.id;


--
-- Name: achievements id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.achievements ALTER COLUMN id SET DEFAULT nextval('public.achievements_id_seq'::regclass);


--
-- Name: activities id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.activities ALTER COLUMN id SET DEFAULT nextval('public.activities_id_seq'::regclass);


--
-- Name: cv_files id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.cv_files ALTER COLUMN id SET DEFAULT nextval('public.cv_files_id_seq'::regclass);


--
-- Name: educations id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.educations ALTER COLUMN id SET DEFAULT nextval('public.educations_id_seq'::regclass);


--
-- Name: experiences id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.experiences ALTER COLUMN id SET DEFAULT nextval('public.experiences_id_seq'::regclass);


--
-- Name: failed_jobs id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.failed_jobs ALTER COLUMN id SET DEFAULT nextval('public.failed_jobs_id_seq'::regclass);


--
-- Name: jobs id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.jobs ALTER COLUMN id SET DEFAULT nextval('public.jobs_id_seq'::regclass);


--
-- Name: migrations id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.migrations ALTER COLUMN id SET DEFAULT nextval('public.migrations_id_seq'::regclass);


--
-- Name: project_images id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.project_images ALTER COLUMN id SET DEFAULT nextval('public.project_images_id_seq'::regclass);


--
-- Name: projects id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.projects ALTER COLUMN id SET DEFAULT nextval('public.projects_id_seq'::regclass);


--
-- Name: publications id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.publications ALTER COLUMN id SET DEFAULT nextval('public.publications_id_seq'::regclass);


--
-- Name: site_settings id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.site_settings ALTER COLUMN id SET DEFAULT nextval('public.site_settings_id_seq'::regclass);


--
-- Name: skills id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.skills ALTER COLUMN id SET DEFAULT nextval('public.skills_id_seq'::regclass);


--
-- Name: social_links id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.social_links ALTER COLUMN id SET DEFAULT nextval('public.social_links_id_seq'::regclass);


--
-- Name: users id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.users ALTER COLUMN id SET DEFAULT nextval('public.users_id_seq'::regclass);


--
-- Data for Name: achievements; Type: TABLE DATA; Schema: public; Owner: -
--

COPY public.achievements (id, title, description, date, image_path, certificate_url, gallery, created_at, updated_at) FROM stdin;
\.


--
-- Data for Name: activities; Type: TABLE DATA; Schema: public; Owner: -
--

COPY public.activities (id, title, content, thumbnail_path, gallery, tags, published_at, created_at, updated_at) FROM stdin;
\.


--
-- Data for Name: cache; Type: TABLE DATA; Schema: public; Owner: -
--

COPY public.cache (key, value, expiration) FROM stdin;
\.


--
-- Data for Name: cache_locks; Type: TABLE DATA; Schema: public; Owner: -
--

COPY public.cache_locks (key, owner, expiration) FROM stdin;
\.


--
-- Data for Name: cv_files; Type: TABLE DATA; Schema: public; Owner: -
--

COPY public.cv_files (id, file_path, public_url, is_active, created_at, updated_at) FROM stdin;
\.


--
-- Data for Name: educations; Type: TABLE DATA; Schema: public; Owner: -
--

COPY public.educations (id, institution, degree, major, start_date, end_date, description, thumbnail_path, created_at, updated_at) FROM stdin;
1	Telkom University	Master of Informatics	Informatics	2024-09-01	2026-05-31	Master's student with GPA 3.94/4.00; research and publications in computer vision and AI.	\N	2025-12-04 16:42:51	2025-12-04 16:42:51
2	Telkom University	Bachelor of Informatics	Informatics	2021-09-01	2024-07-31	Graduated with GPA 3.96/4.00; published conference paper and contributed to multiple academic programs.	\N	2025-12-04 16:42:51	2025-12-04 16:42:51
3	SMA Negeri 2 Bandung	Senior High School	Science	2018-07-01	2021-06-30	Graduated with top school exam score.	\N	2025-12-04 16:42:51	2025-12-04 16:42:51
\.


--
-- Data for Name: experiences; Type: TABLE DATA; Schema: public; Owner: -
--

COPY public.experiences (id, slug, company, role, category, location, start_date, end_date, description, highlights, thumbnail_path, gallery, created_at, updated_at) FROM stdin;
1	freelance-data-computer-vision-engineer	Freelance	Data & Computer Vision Engineer	Professional	Bandung, Indonesia	2025-01-01	2025-09-30	Built computer vision pipelines for player detection/tracking and delivered Power BI dashboards for retail analytics.	["Developed player detection\\/tracking with heatmaps and trajectories.","Delivered retail sales analytics dashboards in Power BI."]	\N	["https:\\/\\/images.unsplash.com\\/photo-1521417531039-96c46e5d12aa?auto=format&fit=crop&w=900&q=80"]	2025-12-04 16:42:50	2025-12-04 16:42:50
2	pt-toyota-astra-motor-intern-data-analytics	PT Toyota Astra Motor	Intern - Data Analytics	Professional	Jakarta, Indonesia	2024-08-01	2024-09-30	Developed interactive dashboards for fixed-asset management and reconciliation, plus a real-time asset movement tracker.	["Built dashboards for fixed-asset management and reconciliation between FAMS and SAP.","Created a real-time asset movement tracker for operational visibility."]	\N	["https:\\/\\/images.unsplash.com\\/photo-1503736334956-4c8f8e92946d?auto=format&fit=crop&w=900&q=80"]	2025-12-04 16:42:50	2025-12-04 16:42:50
3	solafune-inc-research-internship	Solafune Inc.	Research Internship	Professional	Tokyo, Japan (Remote)	2024-04-01	2024-06-30	Contributed to solar panel detection from Sentinel-2 imagery using deep learning and image processing.	["Improved solar panel detection on 13-band Sentinel-2 imagery.","Applied deep learning and image processing to boost accuracy."]	\N	["https:\\/\\/images.unsplash.com\\/photo-1509391366360-2e959784a276?auto=format&fit=crop&w=900&q=80"]	2025-12-04 16:42:50	2025-12-04 16:42:50
4	event-horizon-full-stack-developer	Event Horizon	Full Stack Developer	Professional	Bandung, Indonesia	2020-07-01	2022-07-31	Built and maintained full-stack web platforms for F2WL events, tournament system, and online store.	["Delivered event sites, tournament platform, and online store for F2WL.","Maintained full-stack features across Laravel and modern frontend."]	\N	["https:\\/\\/images.unsplash.com\\/photo-1521737604893-d14cc237f11d?auto=format&fit=crop&w=900&q=80"]	2025-12-04 16:42:50	2025-12-04 16:42:50
5	telkom-university-assistant-lecturer	Telkom University	Assistant Lecturer	Academic	Bandung, Indonesia	2022-09-01	2025-05-31	Assistant lecturer for calculus, data structures, software engineering, OOP, and platform-based application development.	["Assisted courses in Calculus, Advanced Calculus, Data Structures, Software Engineering, OOP, and PBAD.","Supported cohorts across multiple academic years with lab and tutorial guidance."]	\N	["https:\\/\\/images.unsplash.com\\/photo-1523580494863-6f3031224c94?auto=format&fit=crop&w=900&q=80"]	2025-12-04 16:42:50	2025-12-04 16:42:50
6	telkom-university-assistant-practicum-informatics-laboratory	Telkom University	Assistant Practicum - Informatics Laboratory	Academic	Bandung, Indonesia	2022-09-01	2025-05-31	Practicum assistant for Programming Algorithms, Data Structures, Computer Networks, OOP, and AI fundamentals.	["Guided students through programming algorithms, data structures, computer networks, OOP, and AI fundamentals.","Prepared lab materials and supported assessments."]	\N	["https:\\/\\/images.unsplash.com\\/photo-1461749280684-dccba630e2f6?auto=format&fit=crop&w=900&q=80"]	2025-12-04 16:42:50	2025-12-04 16:42:50
7	bangkit-2024-cohort-machine-learning-path	Bangkit 2024 Cohort	Machine Learning Path	Program	Bandung, Indonesia	2024-02-01	2024-06-30	Completed the Bangkit 2024 Machine Learning path with distinction and capstone collaboration with Solafune Inc.	["Graduated with distinction in the ML path.","Selected for Capstone Company Path collaborating with Solafune Inc."]	\N	["https:\\/\\/images.unsplash.com\\/photo-1504384308090-c894fdcc538d?auto=format&fit=crop&w=900&q=80"]	2025-12-04 16:42:51	2025-12-04 16:42:51
8	3rd-international-conference-icoseit-volunteer-editorial-event-team	3rd International Conference (ICOSEIT)	Volunteer - Editorial & Event Team	Organizational	Bandung, Indonesia	2025-09-01	2025-10-31	Volunteer supporting editorial and event execution for ICOSEIT with focus on content quality and session facilitation.	["Proofread and formatted conference materials to maintain consistency.","Co-hosted sessions and guided participants during onsite presentations."]	\N	["https:\\/\\/images.unsplash.com\\/photo-1503428593586-e225b39bddfe?auto=format&fit=crop&w=900&q=80"]	2025-12-04 16:42:51	2025-12-04 16:42:51
9	13th-international-conference-icoict-volunteer-program-editorial-team	13th International Conference (ICOICT)	Volunteer - Program & Editorial Team	Organizational	Bandung, Indonesia	2025-07-01	2025-07-31	Volunteer assisting program management and editorial quality for ICOICT 2025.	["Assisted program team in managing conference sessions.","Proofread and formatted materials to ensure quality and consistency."]	\N	["https:\\/\\/images.unsplash.com\\/photo-1531297484001-80022131f5a1?auto=format&fit=crop&w=900&q=80"]	2025-12-04 16:42:51	2025-12-04 16:42:51
\.


--
-- Data for Name: failed_jobs; Type: TABLE DATA; Schema: public; Owner: -
--

COPY public.failed_jobs (id, uuid, connection, queue, payload, exception, failed_at) FROM stdin;
\.


--
-- Data for Name: job_batches; Type: TABLE DATA; Schema: public; Owner: -
--

COPY public.job_batches (id, name, total_jobs, pending_jobs, failed_jobs, failed_job_ids, options, cancelled_at, created_at, finished_at) FROM stdin;
\.


--
-- Data for Name: jobs; Type: TABLE DATA; Schema: public; Owner: -
--

COPY public.jobs (id, queue, payload, attempts, reserved_at, available_at, created_at) FROM stdin;
\.


--
-- Data for Name: migrations; Type: TABLE DATA; Schema: public; Owner: -
--

COPY public.migrations (id, migration, batch) FROM stdin;
1	0001_01_01_000000_create_users_table	1
2	0001_01_01_000001_create_cache_table	1
3	0001_01_01_000002_create_jobs_table	1
4	2025_01_01_000000_create_portfolio_tables	1
5	2025_09_22_145432_add_two_factor_columns_to_users_table	1
6	2025_12_10_000002_add_icon_path_to_social_links	1
\.


--
-- Data for Name: password_reset_tokens; Type: TABLE DATA; Schema: public; Owner: -
--

COPY public.password_reset_tokens (email, token, created_at) FROM stdin;
\.


--
-- Data for Name: project_images; Type: TABLE DATA; Schema: public; Owner: -
--

COPY public.project_images (id, project_id, image_path, caption, sort_order, created_at, updated_at) FROM stdin;
\.


--
-- Data for Name: projects; Type: TABLE DATA; Schema: public; Owner: -
--

COPY public.projects (id, title, slug, short_description, full_description, category, tech_stack, github_url, website_url, thumbnail_path, status, created_at, updated_at) FROM stdin;
1	Tarkam Football Analytics	tarkam-football-analytics	Computer vision pipeline for player detection, tracking, and match analytics for amateur football.	Built an end-to-end vision pipeline to detect and track players from match footage, generating heatmaps, trajectories, and spatial activity visualizations to surface per-player insights.	AI	["Python","OpenCV","YOLOv8","DeepSORT","Docker"]	\N	\N	\N	published	2025-12-04 16:42:48	2025-12-04 16:42:48
2	Fashion Retail Sales Analytics	fashion-retail-sales-analytics	Power BI dashboards to analyze and visualize sales performance for a fashion retail client.	Designed interactive Power BI dashboards to monitor sales KPIs, visualize trends, and surface actionable insights for retail stakeholders.	Data Analytics	["Power BI","SQL","DAX"]	\N	\N	\N	published	2025-12-04 16:42:48	2025-12-04 16:42:48
3	Asset Management Dashboards	asset-management-dashboards	Interactive dashboards and trackers for fixed-asset management and reconciliation.	Delivered dashboards to manage and reconcile asset data between FAMS and SAP, including a real-time asset movement tracker for operational visibility.	Analytics	["Power BI","SQL","Excel"]	\N	\N	\N	published	2025-12-04 16:42:48	2025-12-04 16:42:48
4	Solar Panel Detection	solar-panel-detection	Deep learning for detecting solar panels from Sentinel-2 satellite imagery.	Contributed to a machine learning project to detect and mask solar panels using 13-band Sentinel-2 satellite imagery, improving detection accuracy with computer vision techniques.	AI	["Python","PyTorch","Satellite Imagery","Computer Vision"]	\N	\N	\N	published	2025-12-04 16:42:48	2025-12-04 16:42:48
5	F2WL Event Platform	f2wl-event-platform	Full-stack web platform and online store for F2WL events and tournaments.	Developed and maintained full-stack websites for F2WL events, covering the main site, tournament platform, and integrated online store.	Web	["Laravel","MySQL","Blade","TailwindCSS"]	\N	\N	\N	published	2025-12-04 16:42:48	2025-12-04 16:42:48
\.


--
-- Data for Name: publications; Type: TABLE DATA; Schema: public; Owner: -
--

COPY public.publications (id, title, published_at, doi_url, certificate_image_path, gallery, description, created_at, updated_at) FROM stdin;
\.


--
-- Data for Name: sessions; Type: TABLE DATA; Schema: public; Owner: -
--

COPY public.sessions (id, user_id, ip_address, user_agent, payload, last_activity) FROM stdin;
\.


--
-- Data for Name: site_settings; Type: TABLE DATA; Schema: public; Owner: -
--

COPY public.site_settings (id, key, value, created_at, updated_at) FROM stdin;
\.


--
-- Data for Name: skills; Type: TABLE DATA; Schema: public; Owner: -
--

COPY public.skills (id, name, category, level, icon_path, created_at, updated_at) FROM stdin;
1	Laravel	Backend	Advanced	\N	2025-12-04 16:42:48	2025-12-04 16:42:48
2	PHP	Backend	Advanced	\N	2025-12-04 16:42:48	2025-12-04 16:42:48
3	MySQL	Backend	Advanced	\N	2025-12-04 16:42:49	2025-12-04 16:42:49
4	Python	Data & AI	Advanced	\N	2025-12-04 16:42:49	2025-12-04 16:42:49
5	Computer Vision	Data & AI	Advanced	\N	2025-12-04 16:42:49	2025-12-04 16:42:49
6	Deep Learning	Data & AI	Advanced	\N	2025-12-04 16:42:49	2025-12-04 16:42:49
7	Power BI	Data Analytics	Advanced	\N	2025-12-04 16:42:49	2025-12-04 16:42:49
8	SQL	Data Analytics	Advanced	\N	2025-12-04 16:42:49	2025-12-04 16:42:49
9	Docker	Cloud & DevOps	Intermediate	\N	2025-12-04 16:42:49	2025-12-04 16:42:49
10	Git	Cloud & DevOps	Advanced	\N	2025-12-04 16:42:49	2025-12-04 16:42:49
11	Tailwind CSS	Frontend	Intermediate	\N	2025-12-04 16:42:50	2025-12-04 16:42:50
12	JavaScript	Frontend	Intermediate	\N	2025-12-04 16:42:50	2025-12-04 16:42:50
\.


--
-- Data for Name: social_links; Type: TABLE DATA; Schema: public; Owner: -
--

COPY public.social_links (id, platform, url, icon_class, created_at, updated_at, icon_path) FROM stdin;
\.


--
-- Data for Name: users; Type: TABLE DATA; Schema: public; Owner: -
--

COPY public.users (id, name, email, email_verified_at, password, remember_token, current_team_id, profile_photo_path, two_factor_secret, two_factor_recovery_codes, two_factor_confirmed_at, created_at, updated_at) FROM stdin;
1	Abiya Makruf	aabbiiyyaa@gmail.com	2025-12-04 16:42:47	$2y$12$6SWMQPT9z6SlHpes4qXECuORUw/N2.FsVMmh99UtMmM3noYNtgotS	h8R0MM1ysE	\N	\N	rPr8VtquCH	uwwnhAkwVF	2025-12-04 16:42:47	2025-12-04 16:42:47	2025-12-04 16:42:47
\.


--
-- Name: achievements_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.achievements_id_seq', 1, false);


--
-- Name: activities_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.activities_id_seq', 1, false);


--
-- Name: cv_files_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.cv_files_id_seq', 1, false);


--
-- Name: educations_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.educations_id_seq', 3, true);


--
-- Name: experiences_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.experiences_id_seq', 9, true);


--
-- Name: failed_jobs_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.failed_jobs_id_seq', 1, false);


--
-- Name: jobs_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.jobs_id_seq', 1, false);


--
-- Name: migrations_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.migrations_id_seq', 6, true);


--
-- Name: project_images_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.project_images_id_seq', 1, false);


--
-- Name: projects_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.projects_id_seq', 5, true);


--
-- Name: publications_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.publications_id_seq', 1, false);


--
-- Name: site_settings_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.site_settings_id_seq', 1, false);


--
-- Name: skills_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.skills_id_seq', 12, true);


--
-- Name: social_links_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.social_links_id_seq', 1, false);


--
-- Name: users_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.users_id_seq', 1, true);


--
-- Name: achievements achievements_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.achievements
    ADD CONSTRAINT achievements_pkey PRIMARY KEY (id);


--
-- Name: activities activities_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.activities
    ADD CONSTRAINT activities_pkey PRIMARY KEY (id);


--
-- Name: cache_locks cache_locks_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.cache_locks
    ADD CONSTRAINT cache_locks_pkey PRIMARY KEY (key);


--
-- Name: cache cache_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.cache
    ADD CONSTRAINT cache_pkey PRIMARY KEY (key);


--
-- Name: cv_files cv_files_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.cv_files
    ADD CONSTRAINT cv_files_pkey PRIMARY KEY (id);


--
-- Name: educations educations_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.educations
    ADD CONSTRAINT educations_pkey PRIMARY KEY (id);


--
-- Name: experiences experiences_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.experiences
    ADD CONSTRAINT experiences_pkey PRIMARY KEY (id);


--
-- Name: experiences experiences_slug_unique; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.experiences
    ADD CONSTRAINT experiences_slug_unique UNIQUE (slug);


--
-- Name: failed_jobs failed_jobs_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.failed_jobs
    ADD CONSTRAINT failed_jobs_pkey PRIMARY KEY (id);


--
-- Name: failed_jobs failed_jobs_uuid_unique; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.failed_jobs
    ADD CONSTRAINT failed_jobs_uuid_unique UNIQUE (uuid);


--
-- Name: job_batches job_batches_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.job_batches
    ADD CONSTRAINT job_batches_pkey PRIMARY KEY (id);


--
-- Name: jobs jobs_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.jobs
    ADD CONSTRAINT jobs_pkey PRIMARY KEY (id);


--
-- Name: migrations migrations_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.migrations
    ADD CONSTRAINT migrations_pkey PRIMARY KEY (id);


--
-- Name: password_reset_tokens password_reset_tokens_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.password_reset_tokens
    ADD CONSTRAINT password_reset_tokens_pkey PRIMARY KEY (email);


--
-- Name: project_images project_images_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.project_images
    ADD CONSTRAINT project_images_pkey PRIMARY KEY (id);


--
-- Name: projects projects_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.projects
    ADD CONSTRAINT projects_pkey PRIMARY KEY (id);


--
-- Name: projects projects_slug_unique; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.projects
    ADD CONSTRAINT projects_slug_unique UNIQUE (slug);


--
-- Name: publications publications_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.publications
    ADD CONSTRAINT publications_pkey PRIMARY KEY (id);


--
-- Name: sessions sessions_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.sessions
    ADD CONSTRAINT sessions_pkey PRIMARY KEY (id);


--
-- Name: site_settings site_settings_key_unique; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.site_settings
    ADD CONSTRAINT site_settings_key_unique UNIQUE (key);


--
-- Name: site_settings site_settings_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.site_settings
    ADD CONSTRAINT site_settings_pkey PRIMARY KEY (id);


--
-- Name: skills skills_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.skills
    ADD CONSTRAINT skills_pkey PRIMARY KEY (id);


--
-- Name: social_links social_links_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.social_links
    ADD CONSTRAINT social_links_pkey PRIMARY KEY (id);


--
-- Name: users users_email_unique; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_email_unique UNIQUE (email);


--
-- Name: users users_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_pkey PRIMARY KEY (id);


--
-- Name: jobs_queue_index; Type: INDEX; Schema: public; Owner: -
--

CREATE INDEX jobs_queue_index ON public.jobs USING btree (queue);


--
-- Name: sessions_last_activity_index; Type: INDEX; Schema: public; Owner: -
--

CREATE INDEX sessions_last_activity_index ON public.sessions USING btree (last_activity);


--
-- Name: sessions_user_id_index; Type: INDEX; Schema: public; Owner: -
--

CREATE INDEX sessions_user_id_index ON public.sessions USING btree (user_id);


--
-- Name: project_images project_images_project_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.project_images
    ADD CONSTRAINT project_images_project_id_foreign FOREIGN KEY (project_id) REFERENCES public.projects(id) ON DELETE CASCADE;


--
-- PostgreSQL database dump complete
--

\unrestrict shF8v4pn3NJ5XGdxlrsAyVPe3cbPLmm3SMIh9u20ZeMlR7FPKhVPfcncSMpTz4n

