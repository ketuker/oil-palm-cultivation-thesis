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
-- Name: accessibility_avarage_geometric; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE accessibility_avarage_geometric (
    id integer NOT NULL,
    road_mills double precision,
    road_town double precision,
    mills_town double precision,
    bobot_road double precision,
    bobot_mills double precision,
    bobot_town double precision,
    cr double precision,
    date timestamp without time zone,
    sum_access_datas integer,
    note character varying
);


ALTER TABLE public.accessibility_avarage_geometric OWNER TO postgres;

--
-- Name: accessibility_avarage_geometric_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE accessibility_avarage_geometric_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.accessibility_avarage_geometric_id_seq OWNER TO postgres;

--
-- Name: accessibility_avarage_geometric_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE accessibility_avarage_geometric_id_seq OWNED BY accessibility_avarage_geometric.id;


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY accessibility_avarage_geometric ALTER COLUMN id SET DEFAULT nextval('accessibility_avarage_geometric_id_seq'::regclass);


--
-- Name: accessibility_avarage_geometric_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY accessibility_avarage_geometric
    ADD CONSTRAINT accessibility_avarage_geometric_pkey PRIMARY KEY (id);


--
-- PostgreSQL database dump complete
--

