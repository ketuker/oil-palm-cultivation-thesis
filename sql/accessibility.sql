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
-- Name: accessibility; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE accessibility (
    id integer NOT NULL,
    road_mills double precision,
    road_town double precision,
    mills_town double precision,
    bobot_road double precision,
    bobot_mills double precision,
    bobot_town double precision,
    cr double precision,
    validation boolean,
    id_user integer,
    date timestamp without time zone
);


ALTER TABLE public.accessibility OWNER TO postgres;

--
-- Name: accessibility_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE accessibility_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.accessibility_id_seq OWNER TO postgres;

--
-- Name: accessibility_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE accessibility_id_seq OWNED BY accessibility.id;


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY accessibility ALTER COLUMN id SET DEFAULT nextval('accessibility_id_seq'::regclass);


--
-- Name: accessibility_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY accessibility
    ADD CONSTRAINT accessibility_pkey PRIMARY KEY (id);


--
-- PostgreSQL database dump complete
--

