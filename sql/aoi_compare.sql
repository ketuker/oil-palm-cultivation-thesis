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


CREATE TABLE aoi_compare (
    id bigint NOT NULL,
    title character varying,
    description character varying,
    dates timestamp with time zone DEFAULT now(),
    id_user integer,
    data text,
    st_area double precision,
    geom geometry(Polygon,4326),
    data_rain text,
    data_temp text,
    data_dm text,
    data_slope text,
    data_text text,
    data_elev text,
    data_thick text,
    data_ripe text,
    data_road text,
    data_mills text,
    data_town text
);



CREATE SEQUENCE aoi_compare_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE aoi_compare_id_seq OWNED BY aoi_compare.id;


ALTER TABLE ONLY aoi_compare ALTER COLUMN id SET DEFAULT nextval('aoi_compare_id_seq'::regclass);


ALTER TABLE ONLY aoi_compare
    ADD CONSTRAINT aoi_compare_pkey PRIMARY KEY (id);



