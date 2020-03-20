<?php

declare(strict_types=1);

/*
 * This file has been auto generated by Jane,
 *
 * Do no edit it directly.
 */

namespace Jane\OpenApi2\JsonSchema\Normalizer;

use Jane\JsonSchemaRuntime\Reference;
use Jane\JsonSchemaRuntime\Normalizer\CheckArray;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class OpenApiNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;

    public function supportsDenormalization($data, $type, $format = null)
    {
        return $type === 'Jane\\OpenApi2\\JsonSchema\\Model\\OpenApi';
    }

    public function supportsNormalization($data, $format = null)
    {
        return $data instanceof \Jane\OpenApi2\JsonSchema\Model\OpenApi;
    }

    public function denormalize($data, $class, $format = null, array $context = [])
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \Jane\OpenApi2\JsonSchema\Model\OpenApi();
        if (\array_key_exists('swagger', $data) && $data['swagger'] !== null) {
            $object->setSwagger($data['swagger']);
            unset($data['swagger']);
        } elseif (\array_key_exists('swagger', $data) && $data['swagger'] === null) {
            $object->setSwagger(null);
        }
        if (\array_key_exists('info', $data) && $data['info'] !== null) {
            $object->setInfo($this->denormalizer->denormalize($data['info'], 'Jane\\OpenApi2\\JsonSchema\\Model\\Info', 'json', $context));
            unset($data['info']);
        } elseif (\array_key_exists('info', $data) && $data['info'] === null) {
            $object->setInfo(null);
        }
        if (\array_key_exists('host', $data) && $data['host'] !== null) {
            $object->setHost($data['host']);
            unset($data['host']);
        } elseif (\array_key_exists('host', $data) && $data['host'] === null) {
            $object->setHost(null);
        }
        if (\array_key_exists('basePath', $data) && $data['basePath'] !== null) {
            $object->setBasePath($data['basePath']);
            unset($data['basePath']);
        } elseif (\array_key_exists('basePath', $data) && $data['basePath'] === null) {
            $object->setBasePath(null);
        }
        if (\array_key_exists('schemes', $data) && $data['schemes'] !== null) {
            $values = [];
            foreach ($data['schemes'] as $value) {
                $values[] = $value;
            }
            $object->setSchemes($values);
            unset($data['schemes']);
        } elseif (\array_key_exists('schemes', $data) && $data['schemes'] === null) {
            $object->setSchemes(null);
        }
        if (\array_key_exists('consumes', $data) && $data['consumes'] !== null) {
            $values_1 = [];
            foreach ($data['consumes'] as $value_1) {
                $values_1[] = $value_1;
            }
            $object->setConsumes($values_1);
            unset($data['consumes']);
        } elseif (\array_key_exists('consumes', $data) && $data['consumes'] === null) {
            $object->setConsumes(null);
        }
        if (\array_key_exists('produces', $data) && $data['produces'] !== null) {
            $values_2 = [];
            foreach ($data['produces'] as $value_2) {
                $values_2[] = $value_2;
            }
            $object->setProduces($values_2);
            unset($data['produces']);
        } elseif (\array_key_exists('produces', $data) && $data['produces'] === null) {
            $object->setProduces(null);
        }
        if (\array_key_exists('paths', $data) && $data['paths'] !== null) {
            $values_3 = new \ArrayObject([], \ArrayObject::ARRAY_AS_PROPS);
            foreach ($data['paths'] as $key => $value_3) {
                if (preg_match('/^x-/', (string) $key) && isset($value_3)) {
                    $values_3[$key] = $value_3;
                    continue;
                }
                if (preg_match('/^\//', (string) $key) && is_array($value_3)) {
                    $values_3[$key] = $this->denormalizer->denormalize($value_3, 'Jane\\OpenApi2\\JsonSchema\\Model\\PathItem', 'json', $context);
                    continue;
                }
            }
            $object->setPaths($values_3);
            unset($data['paths']);
        } elseif (\array_key_exists('paths', $data) && $data['paths'] === null) {
            $object->setPaths(null);
        }
        if (\array_key_exists('definitions', $data) && $data['definitions'] !== null) {
            $values_4 = new \ArrayObject([], \ArrayObject::ARRAY_AS_PROPS);
            foreach ($data['definitions'] as $key_1 => $value_4) {
                $values_4[$key_1] = $this->denormalizer->denormalize($value_4, 'Jane\\OpenApi2\\JsonSchema\\Model\\Schema', 'json', $context);
            }
            $object->setDefinitions($values_4);
            unset($data['definitions']);
        } elseif (\array_key_exists('definitions', $data) && $data['definitions'] === null) {
            $object->setDefinitions(null);
        }
        if (\array_key_exists('parameters', $data) && $data['parameters'] !== null) {
            $values_5 = new \ArrayObject([], \ArrayObject::ARRAY_AS_PROPS);
            foreach ($data['parameters'] as $key_2 => $value_5) {
                $value_6 = $value_5;
                if (is_array($value_5) and isset($value_5['name']) and (isset($value_5['in']) and $value_5['in'] == 'body') and isset($value_5['schema'])) {
                    $value_6 = $this->denormalizer->denormalize($value_5, 'Jane\\OpenApi2\\JsonSchema\\Model\\BodyParameter', 'json', $context);
                } elseif (is_array($value_5) and (isset($value_5['in']) and $value_5['in'] == 'header') and isset($value_5['name']) and (isset($value_5['type']) and ($value_5['type'] == 'string' or $value_5['type'] == 'number' or $value_5['type'] == 'boolean' or $value_5['type'] == 'integer' or $value_5['type'] == 'array'))) {
                    $value_6 = $this->denormalizer->denormalize($value_5, 'Jane\\OpenApi2\\JsonSchema\\Model\\HeaderParameterSubSchema', 'json', $context);
                } elseif (is_array($value_5) and (isset($value_5['in']) and $value_5['in'] == 'formData') and isset($value_5['name']) and (isset($value_5['type']) and ($value_5['type'] == 'string' or $value_5['type'] == 'number' or $value_5['type'] == 'boolean' or $value_5['type'] == 'integer' or $value_5['type'] == 'array' or $value_5['type'] == 'file'))) {
                    $value_6 = $this->denormalizer->denormalize($value_5, 'Jane\\OpenApi2\\JsonSchema\\Model\\FormDataParameterSubSchema', 'json', $context);
                } elseif (is_array($value_5) and (isset($value_5['in']) and $value_5['in'] == 'query') and isset($value_5['name']) and (isset($value_5['type']) and ($value_5['type'] == 'string' or $value_5['type'] == 'number' or $value_5['type'] == 'boolean' or $value_5['type'] == 'integer' or $value_5['type'] == 'array'))) {
                    $value_6 = $this->denormalizer->denormalize($value_5, 'Jane\\OpenApi2\\JsonSchema\\Model\\QueryParameterSubSchema', 'json', $context);
                } elseif (is_array($value_5) and (isset($value_5['required']) and $value_5['required'] == '1') and (isset($value_5['in']) and $value_5['in'] == 'path') and isset($value_5['name']) and (isset($value_5['type']) and ($value_5['type'] == 'string' or $value_5['type'] == 'number' or $value_5['type'] == 'boolean' or $value_5['type'] == 'integer' or $value_5['type'] == 'array'))) {
                    $value_6 = $this->denormalizer->denormalize($value_5, 'Jane\\OpenApi2\\JsonSchema\\Model\\PathParameterSubSchema', 'json', $context);
                }
                $values_5[$key_2] = $value_6;
            }
            $object->setParameters($values_5);
            unset($data['parameters']);
        } elseif (\array_key_exists('parameters', $data) && $data['parameters'] === null) {
            $object->setParameters(null);
        }
        if (\array_key_exists('responses', $data) && $data['responses'] !== null) {
            $values_6 = new \ArrayObject([], \ArrayObject::ARRAY_AS_PROPS);
            foreach ($data['responses'] as $key_3 => $value_7) {
                $values_6[$key_3] = $this->denormalizer->denormalize($value_7, 'Jane\\OpenApi2\\JsonSchema\\Model\\Response', 'json', $context);
            }
            $object->setResponses($values_6);
            unset($data['responses']);
        } elseif (\array_key_exists('responses', $data) && $data['responses'] === null) {
            $object->setResponses(null);
        }
        if (\array_key_exists('security', $data) && $data['security'] !== null) {
            $values_7 = [];
            foreach ($data['security'] as $value_8) {
                $values_8 = new \ArrayObject([], \ArrayObject::ARRAY_AS_PROPS);
                foreach ($value_8 as $key_4 => $value_9) {
                    $values_9 = [];
                    foreach ($value_9 as $value_10) {
                        $values_9[] = $value_10;
                    }
                    $values_8[$key_4] = $values_9;
                }
                $values_7[] = $values_8;
            }
            $object->setSecurity($values_7);
            unset($data['security']);
        } elseif (\array_key_exists('security', $data) && $data['security'] === null) {
            $object->setSecurity(null);
        }
        if (\array_key_exists('securityDefinitions', $data) && $data['securityDefinitions'] !== null) {
            $values_10 = new \ArrayObject([], \ArrayObject::ARRAY_AS_PROPS);
            foreach ($data['securityDefinitions'] as $key_5 => $value_11) {
                $value_12 = $value_11;
                if (is_array($value_11) and (isset($value_11['type']) and $value_11['type'] == 'basic')) {
                    $value_12 = $this->denormalizer->denormalize($value_11, 'Jane\\OpenApi2\\JsonSchema\\Model\\BasicAuthenticationSecurity', 'json', $context);
                } elseif (is_array($value_11) and (isset($value_11['type']) and $value_11['type'] == 'apiKey') and isset($value_11['name']) and (isset($value_11['in']) and ($value_11['in'] == 'header' or $value_11['in'] == 'query'))) {
                    $value_12 = $this->denormalizer->denormalize($value_11, 'Jane\\OpenApi2\\JsonSchema\\Model\\ApiKeySecurity', 'json', $context);
                } elseif (is_array($value_11) and (isset($value_11['type']) and $value_11['type'] == 'oauth2') and (isset($value_11['flow']) and $value_11['flow'] == 'implicit') and isset($value_11['authorizationUrl'])) {
                    $value_12 = $this->denormalizer->denormalize($value_11, 'Jane\\OpenApi2\\JsonSchema\\Model\\Oauth2ImplicitSecurity', 'json', $context);
                } elseif (is_array($value_11) and (isset($value_11['type']) and $value_11['type'] == 'oauth2') and (isset($value_11['flow']) and $value_11['flow'] == 'password') and isset($value_11['tokenUrl'])) {
                    $value_12 = $this->denormalizer->denormalize($value_11, 'Jane\\OpenApi2\\JsonSchema\\Model\\Oauth2PasswordSecurity', 'json', $context);
                } elseif (is_array($value_11) and (isset($value_11['type']) and $value_11['type'] == 'oauth2') and (isset($value_11['flow']) and $value_11['flow'] == 'application') and isset($value_11['tokenUrl'])) {
                    $value_12 = $this->denormalizer->denormalize($value_11, 'Jane\\OpenApi2\\JsonSchema\\Model\\Oauth2ApplicationSecurity', 'json', $context);
                } elseif (is_array($value_11) and (isset($value_11['type']) and $value_11['type'] == 'oauth2') and (isset($value_11['flow']) and $value_11['flow'] == 'accessCode') and isset($value_11['authorizationUrl']) and isset($value_11['tokenUrl'])) {
                    $value_12 = $this->denormalizer->denormalize($value_11, 'Jane\\OpenApi2\\JsonSchema\\Model\\Oauth2AccessCodeSecurity', 'json', $context);
                }
                $values_10[$key_5] = $value_12;
            }
            $object->setSecurityDefinitions($values_10);
            unset($data['securityDefinitions']);
        } elseif (\array_key_exists('securityDefinitions', $data) && $data['securityDefinitions'] === null) {
            $object->setSecurityDefinitions(null);
        }
        if (\array_key_exists('tags', $data) && $data['tags'] !== null) {
            $values_11 = [];
            foreach ($data['tags'] as $value_13) {
                $values_11[] = $this->denormalizer->denormalize($value_13, 'Jane\\OpenApi2\\JsonSchema\\Model\\Tag', 'json', $context);
            }
            $object->setTags($values_11);
            unset($data['tags']);
        } elseif (\array_key_exists('tags', $data) && $data['tags'] === null) {
            $object->setTags(null);
        }
        if (\array_key_exists('externalDocs', $data) && $data['externalDocs'] !== null) {
            $object->setExternalDocs($this->denormalizer->denormalize($data['externalDocs'], 'Jane\\OpenApi2\\JsonSchema\\Model\\ExternalDocs', 'json', $context));
            unset($data['externalDocs']);
        } elseif (\array_key_exists('externalDocs', $data) && $data['externalDocs'] === null) {
            $object->setExternalDocs(null);
        }
        foreach ($data as $key_6 => $value_14) {
            if (preg_match('/^x-/', (string) $key_6)) {
                $object[$key_6] = $value_14;
            }
        }

        return $object;
    }

    public function normalize($object, $format = null, array $context = [])
    {
        $data = [];
        if (null !== $object->getSwagger()) {
            $data['swagger'] = $object->getSwagger();
        } else {
            $data['swagger'] = null;
        }
        if (null !== $object->getInfo()) {
            $data['info'] = $this->normalizer->normalize($object->getInfo(), 'json', $context);
        } else {
            $data['info'] = null;
        }
        if (null !== $object->getHost()) {
            $data['host'] = $object->getHost();
        } else {
            $data['host'] = null;
        }
        if (null !== $object->getBasePath()) {
            $data['basePath'] = $object->getBasePath();
        } else {
            $data['basePath'] = null;
        }
        if (null !== $object->getSchemes()) {
            $values = [];
            foreach ($object->getSchemes() as $value) {
                $values[] = $value;
            }
            $data['schemes'] = $values;
        } else {
            $data['schemes'] = null;
        }
        if (null !== $object->getConsumes()) {
            $values_1 = [];
            foreach ($object->getConsumes() as $value_1) {
                $values_1[] = $value_1;
            }
            $data['consumes'] = $values_1;
        } else {
            $data['consumes'] = null;
        }
        if (null !== $object->getProduces()) {
            $values_2 = [];
            foreach ($object->getProduces() as $value_2) {
                $values_2[] = $value_2;
            }
            $data['produces'] = $values_2;
        } else {
            $data['produces'] = null;
        }
        if (null !== $object->getPaths()) {
            $values_3 = [];
            foreach ($object->getPaths() as $key => $value_3) {
                if (preg_match('/^x-/', (string) $key) && !is_null($value_3)) {
                    $values_3[$key] = $value_3;
                    continue;
                }
                if (preg_match('/^\//', (string) $key) && is_object($value_3)) {
                    $values_3[$key] = $this->normalizer->normalize($value_3, 'json', $context);
                    continue;
                }
            }
            $data['paths'] = $values_3;
        } else {
            $data['paths'] = null;
        }
        if (null !== $object->getDefinitions()) {
            $values_4 = [];
            foreach ($object->getDefinitions() as $key_1 => $value_4) {
                $values_4[$key_1] = $this->normalizer->normalize($value_4, 'json', $context);
            }
            $data['definitions'] = $values_4;
        } else {
            $data['definitions'] = null;
        }
        if (null !== $object->getParameters()) {
            $values_5 = [];
            foreach ($object->getParameters() as $key_2 => $value_5) {
                $value_6 = $value_5;
                if (is_object($value_5)) {
                    $value_6 = $this->normalizer->normalize($value_5, 'json', $context);
                } elseif (is_object($value_5)) {
                    $value_6 = $this->normalizer->normalize($value_5, 'json', $context);
                } elseif (is_object($value_5)) {
                    $value_6 = $this->normalizer->normalize($value_5, 'json', $context);
                } elseif (is_object($value_5)) {
                    $value_6 = $this->normalizer->normalize($value_5, 'json', $context);
                } elseif (is_object($value_5)) {
                    $value_6 = $this->normalizer->normalize($value_5, 'json', $context);
                }
                $values_5[$key_2] = $value_6;
            }
            $data['parameters'] = $values_5;
        } else {
            $data['parameters'] = null;
        }
        if (null !== $object->getResponses()) {
            $values_6 = [];
            foreach ($object->getResponses() as $key_3 => $value_7) {
                $values_6[$key_3] = $this->normalizer->normalize($value_7, 'json', $context);
            }
            $data['responses'] = $values_6;
        } else {
            $data['responses'] = null;
        }
        if (null !== $object->getSecurity()) {
            $values_7 = [];
            foreach ($object->getSecurity() as $value_8) {
                $values_8 = [];
                foreach ($value_8 as $key_4 => $value_9) {
                    $values_9 = [];
                    foreach ($value_9 as $value_10) {
                        $values_9[] = $value_10;
                    }
                    $values_8[$key_4] = $values_9;
                }
                $values_7[] = $values_8;
            }
            $data['security'] = $values_7;
        } else {
            $data['security'] = null;
        }
        if (null !== $object->getSecurityDefinitions()) {
            $values_10 = [];
            foreach ($object->getSecurityDefinitions() as $key_5 => $value_11) {
                $value_12 = $value_11;
                if (is_object($value_11)) {
                    $value_12 = $this->normalizer->normalize($value_11, 'json', $context);
                } elseif (is_object($value_11)) {
                    $value_12 = $this->normalizer->normalize($value_11, 'json', $context);
                } elseif (is_object($value_11)) {
                    $value_12 = $this->normalizer->normalize($value_11, 'json', $context);
                } elseif (is_object($value_11)) {
                    $value_12 = $this->normalizer->normalize($value_11, 'json', $context);
                } elseif (is_object($value_11)) {
                    $value_12 = $this->normalizer->normalize($value_11, 'json', $context);
                } elseif (is_object($value_11)) {
                    $value_12 = $this->normalizer->normalize($value_11, 'json', $context);
                }
                $values_10[$key_5] = $value_12;
            }
            $data['securityDefinitions'] = $values_10;
        } else {
            $data['securityDefinitions'] = null;
        }
        if (null !== $object->getTags()) {
            $values_11 = [];
            foreach ($object->getTags() as $value_13) {
                $values_11[] = $this->normalizer->normalize($value_13, 'json', $context);
            }
            $data['tags'] = $values_11;
        } else {
            $data['tags'] = null;
        }
        if (null !== $object->getExternalDocs()) {
            $data['externalDocs'] = $this->normalizer->normalize($object->getExternalDocs(), 'json', $context);
        } else {
            $data['externalDocs'] = null;
        }
        foreach ($object as $key_6 => $value_14) {
            if (preg_match('/^x-/', (string) $key_6)) {
                $data[$key_6] = $value_14;
            }
        }

        return $data;
    }
}