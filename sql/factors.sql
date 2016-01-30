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
-- Name: factors; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE factors (
    id integer NOT NULL,
    climate_land double precision,
    climate_accessibility double precision,
    land_accessibility double precision,
    bobot_climate double precision,
    bobot_land double precision,
    bobot_accessibility double precision,
    cr double precision,
    validation boolean,
    id_user integer,
    date timestamp with time zone
);


ALTER TABLE public.factors OWNER TO postgres;

--
-- Name: factors_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE factors_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.factors_id_seq OWNER TO postgres;

--
-- Name: factors_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE factors_id_seq OWNED BY factors.id;


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY factors ALTER COLUMN id SET DEFAULT nextval('factors_id_seq'::regclass);


--
-- Name: factors_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY factors
    ADD CONSTRAINT factors_pkey PRIMARY KEY (id);


--
-- PostgreSQL database dump complete
--

