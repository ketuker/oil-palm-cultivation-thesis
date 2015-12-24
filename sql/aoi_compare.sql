--
-- PostgreSQL database dump
--

SET statement_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;

SET search_path = public, pg_catalog;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: aoi_compare; Type: TABLE; Schema: public; Owner: ketuker; Tablespace: 
--

CREATE TABLE aoi_compare (
    id bigint NOT NULL,
    title character varying,
    description character varying,
    dates timestamp with time zone,
    id_user integer,
    data text,
    st_area double precision,
    geom geometry(MultiPolygon,4326)
);


ALTER TABLE public.aoi_compare OWNER TO ketuker;

--
-- Name: aoi_compare_id_seq; Type: SEQUENCE; Schema: public; Owner: ketuker
--

CREATE SEQUENCE aoi_compare_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.aoi_compare_id_seq OWNER TO ketuker;

--
-- Name: aoi_compare_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: ketuker
--

ALTER SEQUENCE aoi_compare_id_seq OWNED BY aoi_compare.id;


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: ketuker
--

ALTER TABLE ONLY aoi_compare ALTER COLUMN id SET DEFAULT nextval('aoi_compare_id_seq'::regclass);


--
-- Data for Name: aoi_compare; Type: TABLE DATA; Schema: public; Owner: ketuker
--



--
-- Name: aoi_compare_id_seq; Type: SEQUENCE SET; Schema: public; Owner: ketuker
--

SELECT pg_catalog.setval('aoi_compare_id_seq', 1, false);


--
-- Name: aoi_compare_pkey; Type: CONSTRAINT; Schema: public; Owner: ketuker; Tablespace: 
--

ALTER TABLE ONLY aoi_compare
    ADD CONSTRAINT aoi_compare_pkey PRIMARY KEY (id);


--
-- PostgreSQL database dump complete
--

