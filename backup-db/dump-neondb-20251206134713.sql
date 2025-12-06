--
-- PostgreSQL database dump
--

\restrict uuBciSLED2YpFi1wxznUvZi6wmMUlnEVyS9tBjgOLjrQ0ufLbkYJroHppdva4H0

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
    updated_at timestamp(0) without time zone,
    videos json
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
    videos json,
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
1	2nd Place Winner in Hackathon Competition by KMTETI, UGM Faculty of Engineering	Secured 2nd place in a hackathon competition organized by KMTETI at the Faculty of Engineering, Universitas Gadjah Mada (UGM). Our team developed a mobile application called Planties, designed to address environmental challenges by simplifying planting activities, thereby promoting sustainable living and environmental stewardship.	2023-06-02	https://storage.googleapis.com/abiya-makruf_portofolio/achievements/Ae2STPwNdTfojF6bOr3YdQcJ7pb5GpaMd9dxr6Vn.jpg	https://storage.googleapis.com/abiya-makruf_portofolio/achievements/certificates/gUPVRLtphWr0nRqVqmqpR0M9LYPULt0Qfwou5f1W.jpg	["https:\\/\\/storage.googleapis.com\\/abiya-makruf_portofolio\\/achievements\\/gallery\\/OfTFC0j7Dt8BNJkmdSaQCgNVxGjmWXkVijJapwaO.jpg","https:\\/\\/storage.googleapis.com\\/abiya-makruf_portofolio\\/achievements\\/gallery\\/sum4UA5z5qj4EJijIgg0ONPRIkVCIwvnlgfaDO7T.jpg","https:\\/\\/storage.googleapis.com\\/abiya-makruf_portofolio\\/achievements\\/gallery\\/IvdtWKlHp8S5k95smHDJgXsPn32iM8kIvJuMUvPf.jpg","https:\\/\\/storage.googleapis.com\\/abiya-makruf_portofolio\\/achievements\\/gallery\\/EfhxuLnxVtFGLyUriKdjkoJKhLWLdzv4AZQqErTC.jpg"]	2025-12-05 14:35:15	2025-12-05 14:35:15
2	Ranked 4th in the Hackathon competition held by Ciputra University Surabaya.	4th place winner in a 24-hour hackathon held onsite at Ciputra University Surabaya. Created an application called KAKATUA that functions to find out about domestic tourism with a camera feature called AI Landmark Detection.	2023-05-14	https://storage.googleapis.com/abiya-makruf_portofolio/achievements/yPRqdEsRS05zrmOCgxz1Tjyszxs6OhaJ3P3GQGcN.jpg	\N	["https:\\/\\/storage.googleapis.com\\/abiya-makruf_portofolio\\/achievements\\/gallery\\/L6Eo1ejaIqBMBj2UMijEhBn2UhNWv6Q7VEnqIrKJ.jpg","https:\\/\\/storage.googleapis.com\\/abiya-makruf_portofolio\\/achievements\\/gallery\\/A97Biwi0UcsAAm9DyRsLSBXCeTvGdSD6KyZsnzMu.png"]	2025-12-05 14:46:41	2025-12-05 14:46:41
3	Distinction Graduate Bangkit Academy Machine Learning Path Batch 1 2024	Participated in the Bangkit Academy 2024, a prestigious independent study program organized by Google, GoTo, and Traveloka. The program offers comprehensive training in Machine Learning, with mentorship from industry experts and instructors, focusing on both technical skills and soft skills development.	2024-07-10	https://storage.googleapis.com/abiya-makruf_portofolio/achievements/Pa3ay8aKUnSI1cqkidO7c3jOFkqGELcWZi8whFT5.jpg	https://storage.googleapis.com/abiya-makruf_portofolio/achievements/certificates/xoT48ZuPWXyseDGmkc2xhDgZ9sIRBXoJriOUU6d4.jpg	["https:\\/\\/storage.googleapis.com\\/abiya-makruf_portofolio\\/achievements\\/gallery\\/Cs3wdr4vzuzjsI2USi0MBiVFlpoy3ikV5vfL67Pz.jpg","https:\\/\\/storage.googleapis.com\\/abiya-makruf_portofolio\\/achievements\\/gallery\\/wr2fVIpVYGtjkNgcETYI9MUgqbED0IqirLCciyAl.jpg","https:\\/\\/storage.googleapis.com\\/abiya-makruf_portofolio\\/achievements\\/gallery\\/Tv07cg2dqIuQmRQRVw9aHccThLZaPqdGtiWJ8lLv.png"]	2025-12-05 14:53:28	2025-12-05 14:53:28
\.


--
-- Data for Name: activities; Type: TABLE DATA; Schema: public; Owner: -
--

COPY public.activities (id, title, content, thumbnail_path, gallery, tags, published_at, created_at, updated_at, videos) FROM stdin;
2	🚀 Excited to share our capstone project journey! 🚀	🌞 Introducing SenseVis: Our innovative solar panel detection system designed to optimize solar energy efficiency by monitoring power output and foggy days! 🌫️🔋\r\n\r\n🔍 What do we aim to achieve?\r\nWe strive to maximize solar energy output under varying weather conditions using advanced detection technology.\r\n\r\n🛠️ How will we achieve this?\r\nBy meticulously following the 5 phases of the project life cycle:\r\n\r\n- Initiation: Define project scope and goals\r\n- Planning: Develop a detailed roadmap and resource allocation\r\n- Execution: Implement detection algorithms and integrate with solar panel systems\r\n- Monitoring: Continuously track performance and adjust as needed\r\n- Closure: Deliver the final optimized solution and assess results\r\n\r\n⏳ Timeline:\r\nOur dedicated team is committed to achieving this in just 6 weeks!\r\n\r\nSpecial thanks to Bangkit and Solafune, Inc. for incredible support and guidance in making this project possible.	https://storage.googleapis.com/abiya-makruf_portofolio/activities/kSgdIXYhopYAxIfg9vaxzZFvtAeL7RjhPcOOFJp1.png	["https:\\/\\/storage.googleapis.com\\/abiya-makruf_portofolio\\/activities\\/gallery\\/xXGp6X7s3zA2zQs7XZx44mC9w8jEDLpd3rQEPe2h.jpg","https:\\/\\/storage.googleapis.com\\/abiya-makruf_portofolio\\/activities\\/gallery\\/Pd3WmJNahsRgsZBxPOFaVVl0towqNnAgJ5w8B4Mt.png","https:\\/\\/storage.googleapis.com\\/abiya-makruf_portofolio\\/activities\\/gallery\\/Ce2rhQRp1J3PMTsYPLgPdTRsVY2maliGY2joffQ4.png","https:\\/\\/storage.googleapis.com\\/abiya-makruf_portofolio\\/activities\\/gallery\\/ok9JWDyxKQ7135ZMGZHIkQlR8AWBx97qzuDznMGT.png"]	["bangkit"]	2025-12-06 12:15:00	2025-12-06 05:18:52	2025-12-06 05:19:16	["https:\\/\\/storage.googleapis.com\\/abiya-makruf_portofolio\\/activities\\/videos\\/gxwstmSd5C7hB26l8ULWEUZh4OWBfi48viuLZ6sK.mp4","https:\\/\\/storage.googleapis.com\\/abiya-makruf_portofolio\\/activities\\/videos\\/qeAhENlRrcr4CzlPLna4LhmbsktPpppusnjLQBRT.mp4"]
3	🎉 I'm excited to share that my second research paper has been officially published at ICoDSA 2025!	🎉 I'm excited to share that my second research paper has been officially published at ICoDSA 2025!\r\n\r\nThis work was done in collaboration with Falah Asyraf Darmawan Putra, Akif Rachmat Hidayah, and Mahmud Dwi Sulistiyo 🙌\r\n\r\n📄 The paper is titled: "Classification of Bean Leaf Lesions Using Modified EfficientNetV2 for Implementation in TensorFlow Lite"\r\n\r\n🧠 In this research, we propose a lightweight and efficient deep learning model for classifying bean leaf diseases specifically Angular Leaf Spot, Bean Rust, and Healthy leaves. By modifying the EfficientNetV2 architecture and optimizing it with TensorFlow Lite, our model achieved high accuracy (97.76%) while remaining suitable for real-time mobile deployment. 🌿📱\r\nThis is a step forward in making AI-powered plant disease detection more accessible to farmers and edge-based systems 🚜🌾	https://storage.googleapis.com/abiya-makruf_portofolio/activities/zgebD4wEkMIBvVCgkKkadH9ROWcyHyXRdJ2FAn85.jpg	["https:\\/\\/storage.googleapis.com\\/abiya-makruf_portofolio\\/activities\\/gallery\\/I7yAfm3Dembm7PHvIRjuyOC6hYlRfEGciXeWTTjc.jpg","https:\\/\\/storage.googleapis.com\\/abiya-makruf_portofolio\\/activities\\/gallery\\/YjrD77dULtnsx4XH8F69fjLEc3qEcAJcaNq8dqaT.png"]	["Research"]	2025-12-06 12:20:00	2025-12-06 05:21:29	2025-12-06 05:21:29	\N
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
1	cv/HE5avXTngpJwHJ2eoBuLw9eM0gmg90tKUOdCmsTR.pdf	https://storage.googleapis.com/abiya-makruf_portofolio/cv/HE5avXTngpJwHJ2eoBuLw9eM0gmg90tKUOdCmsTR.pdf	t	2025-12-05 16:42:33	2025-12-05 16:42:33
\.


--
-- Data for Name: educations; Type: TABLE DATA; Schema: public; Owner: -
--

COPY public.educations (id, institution, degree, major, start_date, end_date, description, thumbnail_path, created_at, updated_at) FROM stdin;
3	SMA Negeri 2 Bandung	Senior High School	Science	2018-07-01	2021-06-30	Students with the highest average school exam scores (Science Program)	https://storage.googleapis.com/abiya-makruf_portofolio/educations/thumbnails/7rcjt93b0ZNS5jmJFnO3jpa2o1l9Hws7vD48bbNt.png	2025-12-05 11:28:37	2025-12-05 14:55:50
2	Telkom University	Bachelor of Informatics	Informatics	2021-09-01	2024-07-31	Graduated with Summa Cum Laude honors. Achieved a GPA of 3.96/4.00. During college, actively participated in activities as a lab assistant, teaching assistant, conference paper publication, and volunteer activities.	https://storage.googleapis.com/abiya-makruf_portofolio/educations/thumbnails/m3yxfrkHANmfhscF4Kgx4a8EYxIf6PmgjUozFTXw.png	2025-12-05 11:28:37	2025-12-05 14:59:29
1	Telkom University	Master of Informatics	Informatics	2024-09-01	2026-05-31	Fast-track Bachelor's-Master's student, specializing in computer vision. Current GPA (semester 3/4) is 3.94/4.00.	https://storage.googleapis.com/abiya-makruf_portofolio/educations/thumbnails/VgC1vKpfNso9l8WUmERmbwKe4voVacCIEiXUkNJK.png	2025-12-05 11:28:37	2025-12-05 15:01:25
\.


--
-- Data for Name: experiences; Type: TABLE DATA; Schema: public; Owner: -
--

COPY public.experiences (id, slug, company, role, category, location, start_date, end_date, description, highlights, thumbnail_path, gallery, created_at, updated_at) FROM stdin;
10	gdsc-itb-graduate-gdsc-itb-graduate	GDSC ITB Graduate	GDSC ITB Graduate	Program	Bandung, Indonesia	2021-09-01	2022-01-01	\N	\N	https://storage.googleapis.com/abiya-makruf_portofolio/experiences/thumbnails/JEw5iW4dAgIqxSffmesP8WWHfkBDZFW8HIfWIXUp.png	[]	2025-12-05 15:07:02	2025-12-05 15:07:02
11	event-horizon-full-stack-website-developer	Event Horizon	Full Stack Website Developer	Professional	Bandung, Indonesia	2019-06-01	2022-12-31	Event horizon is a vendor engaged in simple website development services for event needs, organizations, etc.	["Developing website frontends and backends using PHP (HTML, CSS, JS).","Deploying the websites to a VPS.","Successfully completing six different websites for music events and game competition information needs."]	https://storage.googleapis.com/abiya-makruf_portofolio/experiences/thumbnails/Ct4qQh16lQqNKLCOCxzXVRfAA5DdgYFtIsF3Z6R3.jpg	[]	2025-12-05 15:14:47	2025-12-05 15:14:47
12	informatics-laboratory-telkom-university-practicum-assistant	Informatics Laboratory, Telkom University	Practicum Assistant	Academic	Bandung, Indonesia	2022-09-01	2025-06-30	Served as a Teaching Assistant (TA) since the 3rd semester, covering five key courses: Programming Algorithms (Golang), Data Structures (C++), Computer Networks (Wireshark), Object-Oriented Programming (Java), and Fundamentals of Artificial Intelligence (Python). Additionally, held the role of Data Structures TA Coordinator, responsible for monitoring the activities of approximately 30 TAs, including managing teaching schedules, overseeing grading processes, and supervising examination activities.	["Served as a Laboratory Assistant for 5 technical courses (Algorithms, Data Structures, Computer Networks, OOP, and Basic AI).","Served as a Teaching Assistant for 5 core technical subjects (Golang, C++, Wireshark, Java, Python).","Coordinated and supervised the activities of approximately 30 Data Structures Teaching Assistants."]	https://storage.googleapis.com/abiya-makruf_portofolio/experiences/thumbnails/WYaPpn39uAD6AUXcRaJPNoJaPixW9DrhmZxQ7ce5.jpg	["https:\\/\\/storage.googleapis.com\\/abiya-makruf_portofolio\\/experiences\\/HGsilshbSUKmCq24DGxpQIMunz3E3pxbpMieSkZY.jpg","https:\\/\\/storage.googleapis.com\\/abiya-makruf_portofolio\\/experiences\\/EEt8tUZNOnpljf2IMkZgn4BiZVwAJ5CLTgUo3kXY.jpg","https:\\/\\/storage.googleapis.com\\/abiya-makruf_portofolio\\/experiences\\/voFInaMKRzw2q1xfSzgfaMIhYLBLwUkktSNeNVNP.jpg","https:\\/\\/storage.googleapis.com\\/abiya-makruf_portofolio\\/experiences\\/62VGewKRA2DwM2M1SxieRpnj9vqTTghSzpjUAw0z.jpg"]	2025-12-05 15:27:20	2025-12-05 15:29:21
13	school-of-computing-telkom-university-lecturer-assistant	School of Computing, Telkom University	Lecturer Assistant	Academic	Bandung, Indonesia	2022-09-01	\N	Served as a Lecturer Assistant (LA) since the 3rd semester, supporting nine diverse subjects, including: Calculus, Advanced Calculus, Data Structures, Software Implementation and Testing, Object-Oriented Programming, Platform-Based Applications, Web Programming, Mobile Programming, and Computational Thinking and Introduction to Programming. Responsibilities included delivering instruction (online and onsite) to classes of approximately 40 students, supervising examinations, grading student work, and providing one-on-one academic assistance to students facing difficulties.	["Functioned as a Lecturer Assistant for 9 diverse subjects across mathematical and computer science disciplines.","Conducted teaching sessions for approximately 40 students per class, both online and onsite.","Provided specialized academic support and mentorship to students needing course assistance."]	https://storage.googleapis.com/abiya-makruf_portofolio/experiences/thumbnails/FLnSEuJBH9IwqVqVODRNhSpNODcXvCu1fxlxKpLc.png	["https:\\/\\/storage.googleapis.com\\/abiya-makruf_portofolio\\/experiences\\/P3WqjBP4T4EYTRFkHNcpIo1SuioUkL53yMOO5Zts.png","https:\\/\\/storage.googleapis.com\\/abiya-makruf_portofolio\\/experiences\\/QQ73EoWGLG4C5O0jbrPg1t9mmu7pMe4JNkwIKj7Y.png","https:\\/\\/storage.googleapis.com\\/abiya-makruf_portofolio\\/experiences\\/RrNEVV1G0eDqcpZuETuOKtnam4GmBab4FZT4VRNr.png","https:\\/\\/storage.googleapis.com\\/abiya-makruf_portofolio\\/experiences\\/VYa0yxB3Rco29BkiHSj5bQmsvyFn8MOXUWpYMFlb.jpg"]	2025-12-05 15:37:04	2025-12-05 15:38:46
14	digistar-club-by-telkom-indonesia-digistar-graduate	Digistar Class by Telkom Indonesia	Digistar Graduate	Program	Bandung, Indonesia	2023-06-01	2023-09-01	Completed the Digistar Program, an intensive acceleration initiative by Telkom Indonesia aimed at cultivating Indonesia’s next generation of technology leaders. This program provides rigorous, multi-track training focused on high-demand hard skills (e.g., Development) combined with essential soft skills (e.g., Design Thinking & Growth Mindset) to produce comprehensive, industry-ready tech professionals.	["Successfully completed a rigorous learning path focusing on Developer skills.","Mastered essential non-technical competencies, including Design Thinking and Growth Mindset.","Achieved an exceptional final evaluation, graduating with the highest academic predicate of \\"A\\"."]	https://storage.googleapis.com/abiya-makruf_portofolio/experiences/thumbnails/CYQfoayih9TxpeitepkbTwBC9znaPcWVsudyoKPH.png	["https:\\/\\/storage.googleapis.com\\/abiya-makruf_portofolio\\/experiences\\/eO9UisI5pf5cvVQVeGg1GdvjHutqVBmwFgTyBIGD.png","https:\\/\\/storage.googleapis.com\\/abiya-makruf_portofolio\\/experiences\\/THcCan8009ujn7Rfl5pprHj634p3glKuMFAmjrGj.jpg","https:\\/\\/storage.googleapis.com\\/abiya-makruf_portofolio\\/experiences\\/iYGIL8VpviBZhHoSU31MgT7CKDoeYr0x8BBN7bhi.jpg"]	2025-12-05 15:48:41	2025-12-05 15:54:43
15	bangkit-academy-machine-learning-cohort	Bangkit Academy	Machine Learning Cohort	Program	Bandung, Indonesia	2024-02-01	2024-06-30	Selected to participate in Bangkit Academy 2024, a highly competitive, industry-leading independent study program organized by tech giants Google, GoTo, and Traveloka. Completed the comprehensive Machine Learning learning path, receiving intensive, expert-led training and mentorship focused on developing cutting-edge technical proficiencies and crucial professional soft skills necessary for immediate impact in the tech industry.	["Graduated with the distinction of \\"Distinction Graduate\\" (Lulusan Terbaik), signifying outstanding performance and mastery of the curriculum.","Secured an exclusive Company-Track Capstone Project with Solafune, Inc. (Japan), applying Machine Learning skills to solve real-world problems for an international company."]	https://storage.googleapis.com/abiya-makruf_portofolio/experiences/thumbnails/klnwuAnKtV00xAtcoYqnPGtyElm8P7HfKU4wQ0yo.jpg	["https:\\/\\/storage.googleapis.com\\/abiya-makruf_portofolio\\/experiences\\/FZUXyRNVFXy0RSGsYUv0Yth5GENsqvUHVYl5QTWC.jpg","https:\\/\\/storage.googleapis.com\\/abiya-makruf_portofolio\\/experiences\\/s0jSvMV2dk4efu3PEYJkFAeaMfkGJW37hmc2IC62.jpg","https:\\/\\/storage.googleapis.com\\/abiya-makruf_portofolio\\/experiences\\/oSND1VCMRe3hKB1CHUieK7466XDE1jHPpT7unpi7.jpg","https:\\/\\/storage.googleapis.com\\/abiya-makruf_portofolio\\/experiences\\/XiPDjJdAsyniyikWjsodpQO8AkD4Dp6JBj5UDhhE.jpg"]	2025-12-05 15:58:27	2025-12-05 15:59:31
16	solafune-inc-machine-learning-engineering-intern	Solafune, Inc.	Machine Learning Engineering Intern	Professional	Japan (Remote)	2024-04-01	2024-06-30	Spearheaded the development of a state-of-the-art Deep Learning Computer Vision model designed for the high-precision detection and semantic segmentation of solar panels within Sentinel-2 multi-spectral satellite imagery. The project utilized all 13 spectral bands to maximize detection accuracy in complex environments, significantly enhancing the efficiency of renewable energy mapping and site suitability analysis.	["Developed and fine-tuned a YOLO-based Deep Learning model for high-accuracy solar panel detection and segmentation using multi-spectral Sentinel-2 TIFF data.","Engineered a comprehensive Geo-Spatial Web Application Pipeline, integrating Google Maps for coordinate selection, Google Earth Engine (GEE) for multi-spectral image acquisition, and the specialized YOLO model for real-time inference.","Incorporated historical meteorological data (weather\\/cloud cover analysis) into the web platform to provide essential insights on site suitability and long-term viability for solar panel placement."]	https://storage.googleapis.com/abiya-makruf_portofolio/experiences/thumbnails/U1tmkoSBoUZQzMsMMHDJ85zpe44sJlW2cZH2yZWC.png	["https:\\/\\/storage.googleapis.com\\/abiya-makruf_portofolio\\/experiences\\/yUSZ5k4qEQD2CpdWctKdHjqItmwolYndPgCo7jNH.jpg","https:\\/\\/storage.googleapis.com\\/abiya-makruf_portofolio\\/experiences\\/x9vHaUz0qsso9arkC6NmBnNrW9ZDKEwfDK7zL3JT.png","https:\\/\\/storage.googleapis.com\\/abiya-makruf_portofolio\\/experiences\\/2sLiXQTUE9gVbw2PxUHGGmysuwjjcHa5agMVskCL.png","https:\\/\\/storage.googleapis.com\\/abiya-makruf_portofolio\\/experiences\\/FLqyI28FrYAcbuLjrIialOwWqMTTFaPMjPaUMKqG.png"]	2025-12-05 16:08:35	2025-12-05 16:08:35
20	international-conference-on-software-engineering-and-information-technology-icoseit-conference-program-editorial-assistant-volunteer	International Conference on Software Engineering and Information Technology (ICoSEIT)	Conference Program & Editorial Assistant (Volunteer)	Organizational	Bandung, Indonesia	2025-09-01	2025-10-31	Volunteered for ICoSEIT 2025, serving dual roles within the Editorial Team and Event Operations Team. Responsibilities included conducting meticulous quality control checks on submitted research papers and ensuring the seamless execution of the conference's day-of-event logistics.	["Executed Initial Technical Vetting of submitted research papers, verifying compliance with established conference criteria and formatting standards prior to the full peer-review process.","Supported On-Site Event Execution, actively assisting with day-of-event logistics to ensure all scheduled activities, sessions, and transitions ran smoothly."]	https://storage.googleapis.com/abiya-makruf_portofolio/experiences/thumbnails/IXOJVcQCyqkkneJI6rGwjzD3fqJkauAJa8gYm24x.png	["https:\\/\\/storage.googleapis.com\\/abiya-makruf_portofolio\\/experiences\\/ObqX0fTAu5L7TmUzG7IiVyiVDw4qKyDRAFRLY1gf.jpg","https:\\/\\/storage.googleapis.com\\/abiya-makruf_portofolio\\/experiences\\/F3IY4VCW8dnvZPceFvU6lqetuv1OCN3UAHlnK5VK.jpg","https:\\/\\/storage.googleapis.com\\/abiya-makruf_portofolio\\/experiences\\/fpWYltbeOIzZsu1jzUcdfJTMl1tb4EDNcZUwaQsp.jpg","https:\\/\\/storage.googleapis.com\\/abiya-makruf_portofolio\\/experiences\\/KIPEXwmrhgOalWRbdnuYkfnHTK8VfeQPOGKJ3mFn.jpg"]	2025-12-05 16:36:05	2025-12-05 16:36:05
21	gemastik-xviii-liaison-officer	Gemastik XVIII	Liaison Officer	Organizational	Bandung, Indonesia	2025-10-01	2025-10-31	Appointed as the Technical Liaison Officer for the Data Mining track at the 18th Gemastik Competition (October 26–31). Provided critical technical and operational support, including configuring competition workstations, ensuring system readiness, and supervising participants to maintain fairness and adherence to competition protocols.	["Managed Technical Infrastructure Readiness, specifically preparing and configuring all necessary computer workstations and software environments for the Data Mining competition track.","Acted as Primary Technical Liaison to troubleshoot real-time system issues, ensuring a stable and equitable testing platform for all competitors.","Oversaw Participant Supervision, strictly enforcing competition rules and protocols throughout the event (October 26\\u201331) to guarantee competitive integrity."]	https://storage.googleapis.com/abiya-makruf_portofolio/experiences/thumbnails/JocaipUnYrh9ZDmMu3MZbvGnsEs61jt4MXYx9ZPS.png	["https:\\/\\/storage.googleapis.com\\/abiya-makruf_portofolio\\/experiences\\/icK9yqHPurRClWL7Aep9sbX8O7cWkTjDPw2I5g4N.jpg","https:\\/\\/storage.googleapis.com\\/abiya-makruf_portofolio\\/experiences\\/7z6NKqkv6Zs3Lh6d2mdc3emsgxMIm5E4mGtCEo7A.jpg","https:\\/\\/storage.googleapis.com\\/abiya-makruf_portofolio\\/experiences\\/u8ARyV9p0g8XSiRphyZ6vjm7mJURxgBnJJHIgr1d.jpg","https:\\/\\/storage.googleapis.com\\/abiya-makruf_portofolio\\/experiences\\/UOw9fyHnA0jJ7ghmmjo98aRhnKAy7cZXNccW9jn0.jpg"]	2025-12-05 16:47:08	2025-12-05 16:47:08
17	toyota-astra-motor-tam-information-systems-data-analyst-intern	Toyota Astra Motor (TAM)	Information Systems & Data Analyst Intern	Professional	North Jakarta, Indonesia	2024-08-01	2024-09-30	Successfully developed three key Business Intelligence dashboards to optimize fixed asset management within the Information System Technology Division (ISTD). This initiative focused on enhancing data accuracy and operational efficiency by providing clear, actionable insights into IT asset categorization, movement tracking, and comprehensive data reconciliation between the Fixed Asset Management System (FAMS) and SAP.	["Designed and implemented a dedicated IT Asset Dashboard to provide detailed visualization, category breakdown, and strategic management insights for all fixed assets within the IT scope.","Developed a Real-Time Asset Movement Tracking Dashboard that enabled instantaneous monitoring and control over the physical movement of assets across the organization, significantly enhancing operational security and accountability.","Created a Data Consistency Dashboard to conduct rigorous reconciliation and comparison between asset data stored in the FAMS and the SAP system, ensuring high data accuracy and reliability for critical financial reporting.","Contributed to the optimization of asset management processes and supported informed decision-making by transforming raw system data into clear, strategic Business Intelligence outputs."]	https://storage.googleapis.com/abiya-makruf_portofolio/experiences/thumbnails/TSAVwY1ThcorfEHwOmILuMiu13uZ7pQFYRVdti6z.png	["https:\\/\\/storage.googleapis.com\\/abiya-makruf_portofolio\\/experiences\\/xOWqbClwyVzsPmjosxZ1l6lzSqvkmWowoC8GoDFg.jpg","https:\\/\\/storage.googleapis.com\\/abiya-makruf_portofolio\\/experiences\\/uQIlGVNoaG078F3WclZP8YO9IzdRBNtzq1TE1Ike.jpg","https:\\/\\/storage.googleapis.com\\/abiya-makruf_portofolio\\/experiences\\/bRDldXDKW5bgjkE6cPPj2TrORYucdJIdngGwC6vd.jpg","https:\\/\\/storage.googleapis.com\\/abiya-makruf_portofolio\\/experiences\\/J3beBc95Mw8YkaDnFtaZ6xplj5vcKyDqnCr4ERSg.jpg"]	2025-12-05 16:15:19	2025-12-05 16:15:37
18	tarkam-analytics-computer-vision-sports-analytics-freelance	Tarkam Analytics	Computer Vision & Sports Analytics Freelance	Professional	Jakarta, Indonesia	2025-07-01	2025-09-30	Spearheaded the technical development for the Tarkam Football Analytics project, focused on applying advanced Computer Vision techniques in sports. Successfully engineered a robust object detection and tracking pipeline to monitor field activity, generating deep, per-player statistical insights such as movement patterns, spatial activity distributions, and individualized heatmaps.	["Designed and implemented an End-to-End Computer Vision Pipeline for player monitoring in football analytics, utilizing combined public and proprietary datasets.","Developed high-accuracy Object Detection and Multi-Object Tracking (MOT) models to reliably identify and follow individual players throughout the field of play.","Engineered post-processing algorithms to transform raw tracking data into meaningful per-player statistics, overcoming challenges inherent in complex field-of-view data."]	\N	["https:\\/\\/storage.googleapis.com\\/abiya-makruf_portofolio\\/experiences\\/ib4Am79IAReY42dZ1rhDjmEuCj5kvaEqU7iImgCC.png","https:\\/\\/storage.googleapis.com\\/abiya-makruf_portofolio\\/experiences\\/BrVhDeb5s7ILwKPFuvqqtVxGDiEDWMfgWHLASzC7.png","https:\\/\\/storage.googleapis.com\\/abiya-makruf_portofolio\\/experiences\\/XCOj8TUdcy3BrZgjXfb9hXlRRnTbHwajZzTEWkol.png","https:\\/\\/storage.googleapis.com\\/abiya-makruf_portofolio\\/experiences\\/iEYCIMBlWklToxed0u6q55acjF2MyaQg8Z02URgP.png"]	2025-12-05 16:21:46	2025-12-05 16:21:46
19	international-conference-on-information-and-communication-technology-icoict-2025-conference-program-editorial-assistant-volunteer	International Conference on Information and Communication Technology (ICOICT) 2025	Conference Program & Editorial Assistant (Volunteer)	Organizational	Bandung, Indonesia	2025-07-01	2025-07-31	Volunteered as a combined Program Team and Editorial Team member for ICOICT 2025, an international IEEE conference focusing on Information and Communication Technology. Managed crucial speaker logistics and ensured the technical integrity and quality of all submitted research papers prior to publication.	["Managed Speaker and Presenter Logistics, including directing speakers, coordinating presentation schedules, and ensuring the seamless execution of all conference sessions.","Executed Technical Quality Control for submitted research papers, ensuring full adherence to established IEEE publication standards and conference criteria."]	https://storage.googleapis.com/abiya-makruf_portofolio/experiences/thumbnails/AxCSG7Gc8mRRL2AI86PQNuOj3iDLkyuBF2Y8hciq.jpg	["https:\\/\\/storage.googleapis.com\\/abiya-makruf_portofolio\\/experiences\\/4baNP4js8aVxJqe5tjBcpSUBxQ10ZnB0j0PwHW6p.jpg","https:\\/\\/storage.googleapis.com\\/abiya-makruf_portofolio\\/experiences\\/uxSkHcivu80vR0B6wT74yx614zZ3HpXPZwTtzwa4.png","https:\\/\\/storage.googleapis.com\\/abiya-makruf_portofolio\\/experiences\\/2wSx1LrOFQvPJblppbpZPjvYcwxl2tbxt1Upqj3o.jpg","https:\\/\\/storage.googleapis.com\\/abiya-makruf_portofolio\\/experiences\\/RfELeXBjWqHR16AslPWYvGCvLfDg3bFPDpX7EfrD.jpg"]	2025-12-05 16:27:50	2025-12-05 16:27:50
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
7	2025_12_12_000003_add_videos_to_activities	2
8	2025_12_12_000004_add_videos_to_projects	3
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
9	6	https://storage.googleapis.com/abiya-makruf_portofolio/projects/gallery/DnVcqVx2K0ZvORZHUswjJfwHRAUmCnKii3UMEK0W.jpg	Test 1	0	2025-12-06 05:37:55	2025-12-06 05:52:21
10	6	https://storage.googleapis.com/abiya-makruf_portofolio/projects/gallery/mjqxYxVCFfOoUODSBDP9JAYdqi0TJL9Nb0KK5yez.jpg	Test 2	0	2025-12-06 05:38:05	2025-12-06 05:52:21
11	6	https://storage.googleapis.com/abiya-makruf_portofolio/projects/gallery/oT5YdDGBLCl3coCcA8fbBA3yUUxFw4JcoCtuWHdV.png	\N	0	2025-12-06 05:38:05	2025-12-06 05:52:21
\.


--
-- Data for Name: projects; Type: TABLE DATA; Schema: public; Owner: -
--

COPY public.projects (id, title, slug, short_description, full_description, category, tech_stack, github_url, website_url, thumbnail_path, status, created_at, updated_at, videos) FROM stdin;
6	T	t	Short	Full	AI	["Tech Stack"]	https://www.youtube.com/watch?v=JII_GZlCbIA	https://www.youtube.com/watch?v=JII_GZlCbIA	https://storage.googleapis.com/abiya-makruf_portofolio/projects/thumbnails/59NPh4vhgVuFNIO3UgCI021Ef2hzu2dC7ZU0DpRg.png	published	2025-12-06 05:30:44	2025-12-06 05:52:21	["https:\\/\\/storage.googleapis.com\\/abiya-makruf_portofolio\\/projects\\/videos\\/ALbHIV9AqKYfAxCJqjC2hsETrN7WZizhlNiZ34OM.mp4","https:\\/\\/storage.googleapis.com\\/abiya-makruf_portofolio\\/projects\\/videos\\/NZ8tf3l5dLQUYMoUkW7vxMXr0w8uvpd0EbR38hCw.mp4"]
\.


--
-- Data for Name: publications; Type: TABLE DATA; Schema: public; Owner: -
--

COPY public.publications (id, title, published_at, doi_url, certificate_image_path, gallery, description, created_at, updated_at) FROM stdin;
1	Classification of Apple Leaf Diseases Using a Modified EfficientNet Model	2025-03-11	https://doi.org/10.1109/ICICYTA64807.2024.10913279	https://storage.googleapis.com/abiya-makruf_portofolio/publications/IsVSc9RvKahFfKuxYnwPX1LV1cFMyJLZuzV8frMw.jpg	["https:\\/\\/storage.googleapis.com\\/abiya-makruf_portofolio\\/publications\\/gallery\\/yHTprU3T1UCB0AJWbpBflECXqIkFP1nRwMrZ4fzH.jpg","https:\\/\\/storage.googleapis.com\\/abiya-makruf_portofolio\\/publications\\/gallery\\/ZcKZ1HyOL2537SVSy7My9lg5AtAXTMyKd0cFUzrP.png"]	Developed and evaluated a modified EfficientNet architecture for classifying apple leaf diseases from images, achieving 99.1% training, 97.4% validation, and 84.5% test accuracy with up to 50% fewer parameters. The model maintained high accuracy in complex backgrounds and is well-suited for real-world agricultural use, especially in low-resource settings.	2025-12-05 14:26:21	2025-12-05 14:27:39
2	Classification of Bean Leaf Lesions Using Modified EfficientNetV2 for Implementation in TensorFlow Lite	2025-09-15	https://doi.org/10.1109/ICoDSA67155.2025.11157388	https://storage.googleapis.com/abiya-makruf_portofolio/publications/DLYq48a5kmiY4EO8NCh9fy7p0X7cj7MXBABBSyGv.jpg	["https:\\/\\/storage.googleapis.com\\/abiya-makruf_portofolio\\/publications\\/gallery\\/pZKbl7lj0B6sFPAQi8xqqlUr22Gx0bHf6omjDy6o.jpg","https:\\/\\/storage.googleapis.com\\/abiya-makruf_portofolio\\/publications\\/gallery\\/hjEfc8nY1PrB16KG8CRdNVjwtNe5GrD1b03lsTM6.png"]	Developed a lightweight and accurate model for classifying bean leaf diseases (healthy, Angular Leaf Spot, Bean Rust) using a modified EfficientNetV2B0 architecture. Achieved 97.76% test accuracy, 6.18 MB TFLite model size, and 0.0594 s inference time. Grad-CAM was used for model interpretability. Optimized for real-time, on-device deployment in agriculture, particularly in resource-limited settings. Highlights potential for scalable, efficient plant disease detection solutions.	2025-12-05 14:29:51	2025-12-05 14:29:51
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
1	tagline	Master’s Student in Informatics | Computer Vision & Data Analytics Focus | Backend, DevOps & Cloud Enthusiast	2025-12-05 14:02:17	2025-12-05 14:02:17
2	contact_email	aabbiiyyaa@gmail.com	2025-12-05 14:02:17	2025-12-05 14:02:17
3	contact_email_university	muhammadabiyamakruf@student.telkomuniversity.ac.id	2025-12-05 14:02:17	2025-12-05 14:02:17
5	contact_location	Bandung, Indonesia	2025-12-05 14:02:17	2025-12-05 14:02:17
6	about_name	Muhammad Abiya Makruf	2025-12-05 14:02:17	2025-12-05 14:02:17
7	about_description	I hold a Bachelor's degree in Informatics from Telkom University, Bandung, which I completed in 2025, and I am currently pursuing my Master's degree (3rd semester) in Informatics at the same institution.\r\nMy academic and professional interests lie in machine learning especially computer vision, backend, cloud computing, and DevOps. I am actively seeking internship opportunities where I can apply my technical skills and contribute to real-world projects.	2025-12-05 14:02:17	2025-12-05 14:02:17
8	about_photo_url	https://storage.googleapis.com/abiya-makruf_portofolio/profile/wQLPbkdhFOiFzv7V25GsqVjtsj2jfUYUe2zw2ngr.png	2025-12-05 14:02:17	2025-12-05 14:02:17
4	contact_phone	6282127180662	2025-12-05 14:02:17	2025-12-06 06:42:11
\.


--
-- Data for Name: skills; Type: TABLE DATA; Schema: public; Owner: -
--

COPY public.skills (id, name, category, level, icon_path, created_at, updated_at) FROM stdin;
13	PHP	Programming Languages	Beginner	\N	2025-12-05 17:32:17	2025-12-05 17:34:43
14	Python	Programming Languages	Beginner	\N	2025-12-05 17:35:16	2025-12-05 17:35:16
15	Golang	Programming Languages	Beginner	\N	2025-12-05 17:35:32	2025-12-05 17:35:32
16	C++	Programming Languages	Beginner	\N	2025-12-05 17:35:41	2025-12-05 17:35:41
17	Java	Programming Languages	Beginner	\N	2025-12-05 17:35:56	2025-12-05 17:35:56
18	Java Script	Programming Languages	Beginner	\N	2025-12-05 17:36:16	2025-12-05 17:36:16
19	Laravel	Backend Framework	\N	\N	2025-12-05 17:36:49	2025-12-05 17:36:49
20	Django	Backend Framework	\N	\N	2025-12-05 17:37:38	2025-12-05 17:37:38
21	Flask	Backend Framework	\N	\N	2025-12-05 17:37:42	2025-12-05 17:37:42
22	FastAPI	Backend Framework	\N	\N	2025-12-05 17:37:49	2025-12-05 17:37:49
23	GitHub Actions	DevOps	\N	\N	2025-12-05 17:40:10	2025-12-05 17:40:10
24	Jenkins	DevOps	\N	\N	2025-12-05 17:40:16	2025-12-05 17:40:16
25	Docker	DevOps	\N	\N	2025-12-05 17:40:24	2025-12-05 17:40:24
26	Kubernetes	DevOps	\N	\N	2025-12-05 17:40:31	2025-12-05 17:40:31
27	Google Cloud Project	Cloud	\N	\N	2025-12-05 17:41:08	2025-12-05 17:41:08
28	AWS	Cloud	\N	\N	2025-12-05 17:41:13	2025-12-05 17:41:13
29	Azure	Cloud	\N	\N	2025-12-05 17:41:17	2025-12-05 17:41:17
30	Prometheus	Monitoring	\N	\N	2025-12-05 17:41:43	2025-12-05 17:41:43
31	Grafana	Monitoring	\N	\N	2025-12-05 17:41:48	2025-12-05 17:41:48
32	TensorFlow	AI Development	\N	\N	2025-12-05 17:42:04	2025-12-05 17:42:04
33	PyTorch	AI Development	\N	\N	2025-12-05 17:42:10	2025-12-05 17:42:10
34	YOLO	AI Development	\N	\N	2025-12-05 17:42:16	2025-12-05 17:42:16
35	Roboflow	AI Development	\N	\N	2025-12-05 17:42:23	2025-12-05 17:42:23
36	MLflow	AI Development	\N	\N	2025-12-05 17:42:29	2025-12-05 17:42:29
37	Dagshub	AI Development	\N	\N	2025-12-05 17:42:33	2025-12-05 17:42:33
38	TFRecord/IDX	AI Development	\N	\N	2025-12-05 17:42:42	2025-12-05 17:42:42
39	Docker Compose	DevOps	\N	\N	2025-12-05 17:43:05	2025-12-05 17:43:05
40	Runpod (AI Training Cloud)	Cloud	\N	\N	2025-12-05 17:43:37	2025-12-05 17:43:37
41	Power BI	Other Tools	\N	\N	2025-12-05 17:43:46	2025-12-05 17:43:46
42	Git	Other Tools	\N	\N	2025-12-05 17:43:51	2025-12-05 17:43:51
43	Figma	Other Tools	\N	\N	2025-12-05 17:43:56	2025-12-05 17:43:56
44	Postman	Other Tools	\N	\N	2025-12-05 17:44:01	2025-12-05 17:44:01
\.


--
-- Data for Name: social_links; Type: TABLE DATA; Schema: public; Owner: -
--

COPY public.social_links (id, platform, url, icon_class, created_at, updated_at, icon_path) FROM stdin;
1	github	https://github.com/AbiyaMakruf	\N	2025-12-05 14:16:25	2025-12-05 14:16:25	https://storage.googleapis.com/abiya-makruf_portofolio/socials/icons/UZMzvWonVP1127d2f0d0xV0jrxVhIxQMh2QkRQst.png
2	linkedin	https://www.linkedin.com/in/abiyamakruf/	\N	2025-12-05 14:16:46	2025-12-05 14:16:46	https://storage.googleapis.com/abiya-makruf_portofolio/socials/icons/IZQGPMWWehKVc5jRyKkblvWhuSDgOUtzsOgaNvQn.png
3	instagram	https://www.instagram.com/abiyamf/	\N	2025-12-06 06:45:53	2025-12-06 06:45:53	https://storage.googleapis.com/abiya-makruf_portofolio/socials/icons/SHXMSgH92379pSaQSf8kmQQTHHLK5CqKWN2yvORZ.png
\.


--
-- Data for Name: users; Type: TABLE DATA; Schema: public; Owner: -
--

COPY public.users (id, name, email, email_verified_at, password, remember_token, current_team_id, profile_photo_path, two_factor_secret, two_factor_recovery_codes, two_factor_confirmed_at, created_at, updated_at) FROM stdin;
1	Abiya Makruf	aabbiiyyaa@gmail.com	2025-12-05 11:28:33	$2y$12$gn5tUzFvBNuxEXiPEBQkVOuItOQyfqRuQ6cRIbUetWnvXpOc2NkXi	i8vFiFTZ0mGzfhXKHAFC72cLgDeJdQFNIzGEpXxHRXUjJAKslYt6fEPWEmgX	\N	\N	Ia8InsTA7Q	8jJnTHLZEQ	2025-12-05 11:28:33	2025-12-05 11:28:33	2025-12-05 11:28:33
\.


--
-- Name: achievements_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.achievements_id_seq', 3, true);


--
-- Name: activities_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.activities_id_seq', 3, true);


--
-- Name: cv_files_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.cv_files_id_seq', 1, true);


--
-- Name: educations_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.educations_id_seq', 3, true);


--
-- Name: experiences_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.experiences_id_seq', 21, true);


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

SELECT pg_catalog.setval('public.migrations_id_seq', 8, true);


--
-- Name: project_images_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.project_images_id_seq', 11, true);


--
-- Name: projects_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.projects_id_seq', 6, true);


--
-- Name: publications_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.publications_id_seq', 2, true);


--
-- Name: site_settings_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.site_settings_id_seq', 8, true);


--
-- Name: skills_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.skills_id_seq', 45, true);


--
-- Name: social_links_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.social_links_id_seq', 3, true);


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

\unrestrict uuBciSLED2YpFi1wxznUvZi6wmMUlnEVyS9tBjgOLjrQ0ufLbkYJroHppdva4H0

